<?php

namespace App\Models;

use CodeIgniter\Model;

class m_masterproduk extends Model
{
    protected $table      = 'it_produk';
    protected $primaryKey = 'idproduk';
    protected $useTimestamps = true;
    protected $allowedFields = ['namaproduk', 'deskripsi'];


    public function getMasterproduk($id = false)
    {
        if ($id == false) {
            //return $this->findAll();
            return $this->db->table('it_produk')->get()->getResultArray();
            //return $this->db->query('select * from it_produk where idproduk=2')->getResultArray();

            // <--- ini query join ---->
            // return $this->db->table('it_produk')
            //     ->join('it_masterplan', 'it_produk.idproduk = it_masterplan.idmasterplan')
            //     ->get()->getResultArray();
            // <--- ini query join ---->
        }
        return $this->where(['idproduk' => $id])->first();
    }

    // method untuk insert data ke table, menangkap data dari controler dulu
    public function insertketabel($data)
    {
        return $this->db->table('it_produk')->insert($data);
    }

    public function updateketabel($id, $data)
    {
        return $this->db->table('it_produk')->update($data, array('idproduk' => $id));
    }

    public function deleteketabel($id)
    {
        return $this->db->table('it_produk')->delete(array('idproduk' => $id));
    }
}
