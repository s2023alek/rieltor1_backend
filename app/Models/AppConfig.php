<?php

namespace App\Models;

use CodeIgniter\Model;

class AppConfig extends Model
{

    protected $table = 't_app_cfg';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_name'
        , 's_value'
    ];

}
