<?php

namespace App\Controllers;

use App\Models\ApartmentStatus;
use App\Models\Microdistrict;
use App\Models\Photo;
use App\Models\PhotoSet;
use App\Models\UserApartment;
use CodeIgniter\Exceptions\PageNotFoundException;
use stdClass;

class Apartment extends BaseController
{

    public function index(): string
    {

        return '';
    }

	/*
	{id, title, num_of_rooms, area, price, price_sqm, level, levels, street, sea_distance, is_studio, latitude, longitude, description, mod_date, active, status, status2, microdistrict, viewFromWindow, renovationType, bathroomType, apartmentClass, photosList, legalInformationList, agentsList}
	*/
    public function getOne($id): string
    {

        $a = new stdClass();
        $a->id = $id;

        $m = model('Apartment', false);
        $dApartment = $m->find($id);

        if (!$dApartment) {
            throw PageNotFoundException::forPageNotFound('item not found');
        }

        $a->title = $dApartment['s_title'];
        $a->num_of_rooms = $dApartment['i_num_of_rooms'];
        $a->area = $dApartment['i_area'];
        $a->price = $dApartment['i_price'];
        $a->price_sqm = $dApartment['i_price_sqm'];
        $a->level = $dApartment['i_level'];
        $a->levels = $dApartment['i_levels'];
        $a->street = $dApartment['s_street'];
        $a->sea_distance = $dApartment['i_sea_distance'];
        $a->is_studio = ($dApartment['b_is_studio'] == '1');
        $a->latitude = $dApartment['s_latitude'];
        $a->longitude = $dApartment['s_longitude'];
        $a->description = $dApartment['s_description'];
        $a->mod_date = $dApartment['dt_mod_date'];
        $a->active = ($dApartment['b_active'] == '1');

        if ($dApartment['i_status_id']) {
            $m = model('ApartmentStatus', false);
            $dApartmentStatus = $m->find($dApartment['i_status_id']);
            $a->status = $this->processTitle($dApartmentStatus);
        }

        if ($dApartment['i_status2_id']) {
            $m = model('ApartmentStatus', false);
            $dApartmentStatus2 = $m->find($dApartment['i_status2_id']);
            $a->status2 = $this->processTitle($dApartmentStatus2);
        }

        if ($dApartment['i_microdistrict_id']) {
            $m = model('Microdistrict', false);
            $dMicrodistrict = $m->find($dApartment['i_microdistrict_id']);
            $a->microdistrict = $this->processTitle($dMicrodistrict);
        }

        if ($dApartment['i_view_from_window_id']) {
            $m = model('ViewFromWindow', false);
            $dViewFromWindow = $m->find($dApartment['i_view_from_window_id']);
            $a->viewFromWindow = $this->processTitle($dViewFromWindow);
        }

        if ($dApartment['i_renovation_type_id']) {
            $m = model('RenovationType', false);
            $dRenovationType = $m->find($dApartment['i_renovation_type_id']);
            $a->renovationType = $this->processTitle($dRenovationType);
        }

        if ($dApartment['i_bathroom_type_id']) {
            $m = model('BathroomType', false);
            $dBathroomType = $m->find($dApartment['i_bathroom_type_id']);
            $a->bathroomType = $this->processTitle($dBathroomType);
        }

        if ($dApartment['i_class_id']) {
            $m = model('ApartmentClass', false);
            $dApartmentClass = $m->find($dApartment['i_class_id']);
            $a->apartmentClass = $this->processTitle($dApartmentClass);
        }

        //legal information
        if ($dApartment['s_legal_information_ids']) {
            $m = model('LegalInformation', false);
            $dLegalInformationList = $m->find(explode(",", $dApartment['s_legal_information_ids']));
        }

        $legalInformationList = [];

        if ($dLegalInformationList) {

            foreach ($dLegalInformationList as $liid => $li) {
                $LegalInformationItem = new stdClass();
                $LegalInformationItem->title = $li['s_title'];

                $m = model('LegalInformationTag', false);
                $dLegalInformationTags = $m->find(explode(",", $li['s_tags_ids']));
                $LegalInformationItem->tags = $this->processLegalInformationInfo($dLegalInformationTags);


                $m = model('LegalInformationDocument', false);
                $dLegalInformationDocuments = $m->find(explode(",", $li['s_documents_ids']));
                $LegalInformationItem->documents = $this->processLegalInformationInfo($dLegalInformationDocuments);

                $m = model('LegalInformationWarning', false);
                $dLegalInformationWarnings = $m->find(explode(",", $li['s_warnings_ids']));
                $LegalInformationItem->warnings = $this->processLegalInformationInfo($dLegalInformationWarnings);
                array_push($legalInformationList, $LegalInformationItem);
            }
        }

        //photos
        $pd = PhotoSet::getSet($id);
        if ($pd && $pd) {
            $photoIds = $pd['s_photos_ids'];
            $m = model('Photo', false);
            $photosList = $m->find(explode(",", $photoIds));

            if ($photosList) {
                $a->photosList = $this->processPhotosList($photosList);
            }
        }

        $a->legalInformationList = $legalInformationList;

        //agents ids list
        $aidl = UserApartment::getUsersList($id);
        $al = $this->getUsersData($aidl);
        $a->agentsList = $al;

        return json_encode($a);
    }

    private function getUsersData($idsl)
    {
        if (!$idsl) {
            return null;
        }
        $nu = 0;
        $list = [];
        foreach ($idsl as $item) {
            array_push($list, $item['fk_i_user_id']);
            $nu += 1;
            if ($nu > 1) {
                //maximum 2 users
                break;
            }
        }

        $m = model('User', false);
        $usersData = $m->find($list);

        foreach ($usersData as $key => $d) {
            $m = model('Photo', false);
            $photo = $m->find($d['fk_i_photo_id']);
            if ($photo) {
                $usersData[$key]['photoPath'] = $photo['s_filename'];
            }
            $m = model('UserRole', false);
            $role = $m->find($d['fk_i_role_id']);
            if ($role) {
                $usersData[$key]['role'] = $role['s_title'];
            }
        }
        //process userdata
        $users = [];
        foreach ($usersData as $key => $d) {
            $u = new stdClass();
            $u->id = $d['pk_i_id'];
            $u->name = $d['s_name'];
            $u->phone = $d['s_phone'];
            $u->role = $d['role'];
            $u->photoPath = $d['photoPath'];
            array_push($users, $u);
        }
        return $users;
    }

    private function processPhotosList($list)
    {
        if (!$list) {
            return null;
        }
        $d = [];
        foreach ($list as $id => $item) {
            array_push($d, $item['s_filename']);
        }
        return $d;
    }

    private function processLegalInformationInfo($info)
    {
        if (!$info) {
            return null;
        }
        $d = [];
        foreach ($info as $liiid => $lii) {
            array_push($d, $lii['s_title']);
        }
        return $d;
    }

    private function processTitle($info)
    {
        if (!$info) {
            return null;
        }

        return $info['s_title'];
    }
}
