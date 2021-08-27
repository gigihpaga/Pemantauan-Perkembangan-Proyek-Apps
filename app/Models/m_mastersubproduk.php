<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mastersubproduk extends Model
{
    protected $table      = 'it_subproduk';
    protected $primaryKey = 'idsubproduk';
    protected $useTimestamps = true;
    protected $allowedFields = ['namasubproduk', 'deskripsi'];


    public function getMastersubproduk($id = false)
    {
        if ($id == false) {
            // $query =  $this->db->table('it_subproduk')->get()->getResultArray();
            // $query = 
            return $this->db->table('it_subproduk')
                ->select('it_produk.idproduk ,namaproduk, idsubproduk ,namasubproduk, it_subproduk.deskripsi deskripsisub')
                ->join('it_produk', 'it_produk.idproduk = it_subproduk.idproduk', 'left')
                // ->get()->getResultArray()
                // ->where('sc is null')
                // ->orderBy('sc asc')
                ->get()->getResultArray();
        }
        return $this->where(['idsubproduk' => $id])->first();
    }

    public function getMastersubprodukbyproduk($id)
    {
        // return $this->db->getWhere('it_subproduk', ['idproduk' => $id])->result();
        return $this->db->table('it_subproduk')
            ->where('idproduk', $id)->get()->getResultArray();
        // ->where('idproduk', $id)->get()->getResultArray();
    }

    public function insertketabel($data)
    {
        return $this->db->table('it_subproduk')->insert($data);
    }

    public function updateketabel($id, $data)
    {
        return $this->db->table('it_subproduk')->update($data, array('idsubproduk' => $id));
    }

    public function deleteketabel($id)
    {
        return $this->db->table('it_subproduk')->delete(array('idsubproduk' => $id));
    }
}
