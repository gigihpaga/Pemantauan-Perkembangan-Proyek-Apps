<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mastermodul extends Model
{
    // protected $table      = 'it_subproduk';
    // protected $primaryKey = 'idsubproduk';
    // protected $useTimestamps = true;
    // protected $allowedFields = ['namasubproduk', 'deskripsi'];


    public function getMastermodul($id = false)
    {
        if ($id == false) {
            return $this->db->table('it_modul')
                ->select('it_modul.idmodul, it_modul.namamodul, it_modul.deskripsi, it_modul.status, it_subproduk.idsubproduk, it_subproduk.namasubproduk, it_produk.idproduk, it_produk.namaproduk, it_tipemodul.idtipemodul, it_tipemodul.kodetipemodul')
                ->join('it_tipemodul', 'it_modul.tipemodul = it_tipemodul.idtipemodul', 'left')
                ->join('it_subproduk', 'it_modul.idsubproduk = it_subproduk.idsubproduk', 'left')
                ->join('it_produk', 'it_subproduk.idproduk = it_produk.idproduk')
                ->get()->getResultArray();
        }
        return $this->where(['idmodul' => $id])->first();
    }

    public function getTipemodul()
    {
        return $this->db->table('it_tipemodul')->get()->getResultArray();
    }
    public function getMaxidmodul()
    {
        return $this->db->query('select max(idmodul) as maxid from it_modul')->getResultArray();
    }

    public function insertketabel($data)
    {
        return $this->db->table('it_modul')->insert($data);
    }

    public function updateketabel($id, $data)
    {
        return $this->db->table('it_modul')->update($data, array('idmodul' => $id));
    }

    public function deleteketabel($id)
    {
        return $this->db->table('it_modul')->delete(array('idmodul' => $id));
    }
}
