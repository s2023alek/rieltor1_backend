<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewFromWindow extends Model
{

    protected $table = 't_view_from_window';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
