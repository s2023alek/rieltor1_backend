<?php

namespace App\Models;

use CodeIgniter\Model;

class ApartmentStatus2 extends Model
{

    protected $table = 't_a_status2';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
