<?php

namespace App\Models;

use CodeIgniter\Model;

class Photo extends Model
{

    protected $table = 't_photo';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_filename',
    ];

}
