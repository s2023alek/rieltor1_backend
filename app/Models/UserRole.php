<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRole extends Model
{

    protected $table = 't_u_role';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
