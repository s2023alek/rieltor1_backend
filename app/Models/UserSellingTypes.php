<?php

namespace App\Models;

use CodeIgniter\Model;

class UserSellingTypes extends Model
{

    protected $table = 't_u_selling_types';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
