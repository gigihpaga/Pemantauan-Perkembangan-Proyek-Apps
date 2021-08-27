<?php

namespace App\Models;

use CodeIgniter\Model;

class m_proyek extends Model
{
    protected $table = 'it_proyek';
    protected $tableDetail = 'it_proyekdetail';
    protected $tableTipeProyek = 'it_tipeproyek';
    protected $tableModul = 'it_modul';
    protected $tableUser = 'it_users';

    public function getProyek()
    {
        
        $sql = "SELECT p.*, t.namatipeproyek FROM $this->table p LEFT JOIN $this->tableTipeProyek t ON p.idtipeproyek = t.idtipeproyek";
        return $this->db->query($sql)->getResultArray();

    }

    public function getDetailProyek()
    {
        $sql = "SELECT d.*, m.namamodul FROM $this->tableDetail d LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul";
        return $this->db->query($sql)->getResultArray();
    }

    public function getTipeProyek()
    {
        return $this->db->table($this->tableTipeProyek)->get()->getResultArray();
    }

    public function getModul()
    {
        return $this->db->table($this->tableModul)->get()->getResultArray();
    }

    public function getUser($jabatan)
    {
        return $this->db->table($this->tableUser)->where('jabatan', $jabatan)->get()->getResultArray();
    }

    // method untuk insert data ke table, menangkap data dari controler dulu
    
    public function last_id()
    {
        return $this->db->insertID();
    }
    public function insertketabel($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function insertketabeldetail($data)
    {
        return $this->db->table($this->tableDetail)->insert($data);
    }

    public function updateketabel($id, $data)
    {
        return $this->db->table($this->table)->update($data, array('idproyek' => $id));
    }

    public function deleteketabel($id)
    {
        return $this->db->table($this->table)->delete(array('idproyek' => $id));
    }

    public function deleteketabeldetail($id)
    {
        return $this->db->table($this->tableDetail)->delete(array('idproyek' => $id));
    }
}
