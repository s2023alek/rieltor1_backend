<?php

namespace App\Models;

use CodeIgniter\Model;

class LegalInformationWarning extends Model
{

    protected $table = 't_legal_i_warning';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
