<?php

namespace App\Models;

use CodeIgniter\Model;

class RenovationType extends Model
{

    protected $table = 't_renovation_type';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
