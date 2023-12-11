<?php

namespace App\Models;

use CodeIgniter\Model;

class LegalInformation extends Model
{

    protected $table = 't_legal_information';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        's_title',
        's_tags_ids',
        's_documents_ids',
        's_warnings_ids',
    ];

}
