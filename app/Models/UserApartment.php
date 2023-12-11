<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * apartments list for the user
 */
class UserApartment extends Model
{

    protected $table = 't_user_apartment';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        'fk_i_user_id'
        , 'fk_i_apartment_id'
    ];

    public static function getUsersList($apartmentId) {
        $m = model('UserApartment', false);
        $d = $m->where('fk_i_apartment_id', $apartmentId)->findAll();
        return $d;
    }

}
