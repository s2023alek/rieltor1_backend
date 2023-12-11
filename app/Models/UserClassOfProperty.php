<?php

namespace App\Models;

use CodeIgniter\Model;

class UserClassOfProperty extends Model
{

    protected $table = 't_u_class_of_property';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
