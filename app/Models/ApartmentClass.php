<?php

namespace App\Models;

use CodeIgniter\Model;

class ApartmentClass extends Model
{

    protected $table = 't_a_class';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
