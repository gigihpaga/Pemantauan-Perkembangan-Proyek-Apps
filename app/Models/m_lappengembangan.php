<?php

namespace App\Models;

use CodeIgniter\Model;

class m_lappengembangan extends Model
{
    protected $table = 'it_proyek';
    protected $tableDetail = 'it_proyekdetail';
    protected $tableTipeProyek = 'it_tipeproyek';
    protected $tableModul = 'it_modul';
    protected $tableHistory = 'it_proyekhistory';
    protected $tableProduk = 'it_produk';
    protected $tableSubProduk = 'it_subproduk';

    public function getLapPengembangan($idproyek, $tahun, $idtipeproyek, $idsubproduk)
    {
        $swhere = "";

        if ($idproyek) 
            $swhere = " AND p.idproyek = '$idproyek' ";
        if ($tahun) 
            $swhere = " AND p.tahun = '$tahun' ";
        if ($idtipeproyek) 
            $swhere = " AND p.idtipeproyek = '$idtipeproyek' ";
        if ($idsubproduk)
            $swhere = " AND m.idsubproduk = '$idsubproduk' ";
        
        $sql = "SELECT p.idproyek,p.namaproyek, t.namatipeproyek, m.idsubproduk, sp.namasubproduk, p.deskripsi
                FROM $this->table p LEFT JOIN $this->tableTipeProyek t ON t.idtipeproyek = p.idtipeproyek
                LEFT JOIN $this->tableDetail d ON p.idproyek = d.idproyek 
                LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul
                LEFT JOIN $this->tableSubProduk sp ON m.idsubproduk = sp.idsubproduk
                WHERE (1=1) " . $swhere;
        // echo $sql;
        $data = $this->db->query($sql)->getResultArray();

        $sql = "SELECT d.idproyek, COUNT(d.idproyekdetail) AS jml
                FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
                WHERE idproyekhistory IN (
                    (
                        SELECT MAX(idproyekhistory) 
                        FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                        WHERE (1=1)
                        GROUP BY h.idproyekdetail
                    )
                ) AND aksi = 'qcaccept'
                GROUP BY idproyek";
        $data_qcacc = $this->db->query($sql)->getResultArray();

        $sql = "SELECT d.idproyek, COUNT(d.idproyekdetail) AS jml
                FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
                WHERE idproyekhistory IN (
                    (
                        SELECT MAX(idproyekhistory) 
                        FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                        WHERE (1=1)
                        GROUP BY h.idproyekdetail
                    )
                ) AND aksi = 'useraccept'
                GROUP BY idproyek";
        $data_useracc = $this->db->query($sql)->getResultArray();

        return array('data' => $data, 'qc_acc' => $data_qcacc, 'user_acc' => $data_useracc);

    }
}
