<?php

namespace App\Models;

use CodeIgniter\Model;

class LegalInformationDocument extends Model
{

    protected $table = 't_legal_i_document';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title'
    ];

}
