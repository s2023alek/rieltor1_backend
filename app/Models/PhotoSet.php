<?php

namespace App\Models;

use CodeIgniter\Model;

class PhotoSet extends Model
{

    protected $table = 't_photo_set';
    protected $primaryKey = "pk_i_id";
    protected $allowedFields = [
        'fk_apartment_id',
        's_photos_ids',
    ];

    public static function getSet($apartmentId)
    {
        $m = model('PhotoSet', false);
        $d = $m->where('fk_i_apartment_id', $apartmentId)->findAll();
        return $d ? $d[0] : null;
    }
}
