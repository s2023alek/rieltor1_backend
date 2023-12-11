<?php

namespace App\Models;

use CodeIgniter\Model;

class BathroomType extends Model
{

    protected $table = 't_bathroom_type';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
