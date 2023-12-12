<?php

namespace App\Controllers;

use App\Models\ApartmentStatus;
use App\Models\Microdistrict;
use App\Models\Photo;
use App\Models\PhotoSet;
use App\Models\UserApartment;
use CodeIgniter\Exceptions\PageNotFoundException;
use stdClass;

class Rieltor extends BaseController
{

    public function index(): string
    {

        return '';
    }

    /*
    {"id":"1","photoPath":"1701598276_5e5bbf2784c97e500920.jpg","role":"","classOfPropertyList":[{"title":""}],"sellingTypesList":[{"title":""}],"name":"","phone":"+7111111111"}
    */
    public function getOne($id): string
    {

        $a = new stdClass();
        $a->id = $id;


        $m = model('User', false);
        $d = $m->find($id);

        if (!$d) {
            throw PageNotFoundException::forPageNotFound('item not found');
        }



        $m = model('Photo', false);
        $photo = $m->find($d['fk_i_photo_id']);

        $a->photoPath = null;
        if ($photo) {
            $a->photoPath = $photo['s_filename'];
        }

        $m = model('UserRole', false);
        $role = $m->find($d['fk_i_role_id']);
        if ($role) {
            $a->role = $role['s_title'];
        }

        $m = model('UserRole', false);
        $role = $m->find($d['fk_i_role_id']);
        if ($role) {
            $a->role = $role['s_title'];
        }

        //UserClassOfProperty
        if ($d['s_class_of_property_ids']) {
            $m = model('UserClassOfProperty', false);
            $dItem = $m->find(explode(",", $d['s_class_of_property_ids']));
        }
        $cops = [];
        if ($dItem) {
            foreach ($dItem as $li) {
                $aCOP = new stdClass();
                $aCOP->title = $li['s_title'];
                array_push($cops, $aCOP);
            }
        }
        $a->classOfPropertyList = $cops;


        //selling_types_ids
        if ($d['selling_types_ids']) {
            $m = model('UserSellingTypes', false);
            $dItem = $m->find(explode(",", $d['selling_types_ids']));
        }
        $cops = [];
        if ($dItem) {
            foreach ($dItem as $li) {
                $aCOP = new stdClass();
                $aCOP->title = $li['s_title'];
                array_push($cops, $aCOP);
            }
        }
        $a->sellingTypesList = $cops;


        //process userdata

        $a->name = $d['s_name'];
        $a->phone = $d['s_phone'];

        return json_encode($a);
    }
}