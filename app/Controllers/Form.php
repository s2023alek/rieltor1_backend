<?php

namespace App\Controllers;

use App\Models\Photo;

class Form extends BaseController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index():string
    {
        return view('form');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store():string
    {

        helper(['form', 'url']);

       // $db = \Config\Database::connect();
        //$builder = $db->table('file');

        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);

        $msg = 'Please select a valid file';

        if ($validated) {
            $file = $this->request->getFile('file');
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);

            /*$model = new Photo();
            $data = [
                's_name' => $newName,
            ];
            $model->insert($data);*/

            $imagePath = base_url('uploads/').$newName;

            $msg = 'File has been uploaded:'.$imagePath;
        }
        $params = [
            'msg' => $msg,
            'imagePath' => $imagePath
        ];
        return view('photos_upload_result', $params);

    }

}
