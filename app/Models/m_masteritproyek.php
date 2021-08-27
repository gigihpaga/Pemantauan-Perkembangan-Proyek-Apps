<?php

namespace App\Models;

use CodeIgniter\Model;

class m_masteritproyek extends Model
{
    protected $table      = 'it_produk';
    protected $primaryKey = 'idproyek';
    protected $useTimestamps = true;
    protected $allowedFields = ['namaproyek', 'deskripsi', 'slug'];


    public function getMasteritproyek($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
