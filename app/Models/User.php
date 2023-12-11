<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class User extends Model
{

    protected $table = 't_user';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_name'
        , 's_username'
        , 's_password'
        , 's_email'
        , 's_phone'
        , 'b_enabled'
        , 'fk_i_photo_id'
        , 'fk_i_role_id'
        , 'fk_i_class_of_property_ids'
        , 'selling_types_ids'
    ];

}
