<?php

namespace App\Models;

use CodeIgniter\Model;

class m_pekerjaan extends Model
{
    protected $table = 'it_proyek';
    protected $tableDetail = 'it_proyekdetail';
    protected $tableTipeProyek = 'it_tipeproyek';
    protected $tableModul = 'it_modul';
    protected $tableHistory = 'it_proyekhistory';

    public function getPekerjaan($column)
    {
        $username = session()->get('iduser');
        $swhere = "";
        switch (session()->get('role')) {
            case 'ba':
                break;
            case 'dev':
                $swhere = " AND (aksi = 'docdone' OR aksi = 'devprogres' OR aksi = 'devdone') ";
                break;
            case 'qc':
                $swhere = " AND (aksi = 'devdone' OR aksi = 'qcprogres' OR aksi = 'qcfailed' OR aksi = 'qcaccept') ";
                break;
            case 'user':
            default:
                $swhere = " AND (aksi = 'qcaccept' OR aksi = 'useraccept' OR aksi = 'userreject') ";
                break;
        }
        /*$sql = "SELECT x.aksi, p.namaproyek, d.*, m.namamodul
                FROM $this->tableDetail d LEFT JOIN $this->table p ON p.idproyek = d.idproyek 
                LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul
                LEFT JOIN (SELECT idproyekdetail, aksi FROM $this->tableHistory ORDER BY idproyekhistory DESC LIMIT 1) AS x ON x.idproyekdetail = d.idproyekdetail
                WHERE $column = ? " . $swhere;*/
        $sql = "SELECT x.aksi, p.namaproyek, d.*, m.namamodul
                FROM $this->tableDetail d LEFT JOIN $this->table p ON p.idproyek = d.idproyek 
                LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul
                LEFT JOIN (
                    SELECT aksi, idproyekdetail 
                    FROM it_proyekhistory h
                    WHERE idproyekhistory IN (
                       (
                           SELECT MAX(idproyekhistory) 
                           FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                           WHERE (1=1) 
                           GROUP BY h.idproyekdetail
                       )
                    )
                ) AS x ON x.idproyekdetail = d.idproyekdetail
                WHERE $column = ? " . $swhere;
                        // echo $sql; die();
        return $this->db->query($sql,$username)->getResultArray();
    }

    public function getDetailProyek()
    {
        $sql = "SELECT d.*, m.namamodul FROM $this->tableDetail d LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul";
        return $this->db->query($sql)->getResultArray();
    }

    // method untuk insert data ke table, menangkap data dari controler dulu
    
    public function insertketabel($data)
    {
        $this->db->table($this->tableHistory)->insert($data);
    }

}
