<?php

namespace App\Models;

use CodeIgniter\Model;

class ApartmentStatus extends Model
{

    protected $table = 't_a_status';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
