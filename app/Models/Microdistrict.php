<?php

namespace App\Models;

use CodeIgniter\Model;

class Microdistrict extends Model
{

    protected $table = 't_microdistrict';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
