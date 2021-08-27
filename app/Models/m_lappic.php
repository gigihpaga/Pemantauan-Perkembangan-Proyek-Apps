<?php

namespace App\Models;

use CodeIgniter\Model;

class m_lappic extends Model
{
    protected $table = 'it_proyek';
    protected $tableDetail = 'it_proyekdetail';
    protected $tableTipeProyek = 'it_tipeproyek';
    protected $tableModul = 'it_modul';
    protected $tableHistory = 'it_proyekhistory';
    protected $tableProduk = 'it_produk';
    protected $tableSubProduk = 'it_subproduk';
    protected $tableUser = 'it_users';

    public function getLapPengembangan($idproyek, $jabatan, $iduser, $idsubproduk)
    {
        $swhere = "";

        if ($idproyek) 
            $swhere = " AND p.idproyek = '$idproyek' ";
        if ($idsubproduk)
            $swhere = " AND m.idsubproduk = '$idsubproduk' ";
        if ($iduser)
            $swhere = " AND u.iduser = '$iduser' ";
        if ($jabatan)
            $swhere = " AND u.jabatan = '$jabatan' ";
        
        /*$sql = "SELECT x.aksi, p.namaproyek, d.*, m.namamodul, t.namatipeproyek, pp.namaproduk, sp.namasubproduk
                FROM $this->tableDetail d LEFT JOIN $this->table p ON p.idproyek = d.idproyek 
                LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul
                LEFT JOIN (SELECT idproyekdetail, aksi FROM $this->tableHistory ORDER BY idproyekhistory DESC LIMIT 1) AS x ON x.idproyekdetail = d.idproyekdetail
                JOIN $this->tableTipeProyek t ON t.idtipeproyek = p.idtipeproyek
                JOIN $this->tableProduk pp ON pp.idproduk = m.idproduk
                JOIN $this->tableSubProduk sp ON sp.idsubproduk = m.idsubproduk
                WHERE (1=1) " . $swhere;*/
        $sql = "SELECT u.iduser, u.jabatan, u.namauser, sp.idsubproduk, sp.namasubproduk, p.namaproyek, p.idproyek, d.idmodul
                FROM $this->tableUser u LEFT JOIN $this->tableDetail d ON (d.pic_ba = u.iduser OR d.pic_dev = u.iduser OR d.pic_qc = u.iduser OR d.pic_user = u.iduser)
                LEFT JOIN $this->table p ON p.idproyek = d.idproyek 
                LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul 
                LEFT JOIN $this->tableSubProduk sp ON sp.idsubproduk = m.idsubproduk
                WHERE u.jabatan <> 'administrator' " . $swhere;
                // echo $sql;
        $data = $this->db->query($sql)->getResultArray();

        $sql = "SELECT COUNT(DISTINCT d.idmodul) AS jml, u.iduser
                FROM $this->tableUser u LEFT JOIN $this->tableDetail d ON (d.pic_ba = u.iduser OR d.pic_dev = u.iduser OR d.pic_qc = u.iduser OR d.pic_user = u.iduser)
                LEFT JOIN $this->table p ON p.idproyek = d.idproyek 
                LEFT JOIN $this->tableModul m ON d.idmodul = m.idmodul 
                LEFT JOIN $this->tableSubProduk sp ON sp.idsubproduk = m.idsubproduk
                WHERE u.jabatan <> 'administrator' " . $swhere;
        $sql.= "GROUP BY u.iduser";
                // echo $sql;
        $jmlmodul = $this->db->query($sql)->getResultArray();
                
        $sql = "SELECT COUNT(DISTINCT d.idmodul) AS jml, u.iduser
                    FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
                    LEFT JOIN $this->tableUser u ON (d.pic_ba = u.iduser OR d.pic_dev = u.iduser OR d.pic_qc = u.iduser OR d.pic_user = u.iduser)
                    WHERE idproyekhistory IN (
                        (
                            SELECT MAX(idproyekhistory) 
                            FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                            WHERE (1=1) 
                            GROUP BY h.idproyekdetail
                        )
                    ) AND aksi = 'useraccept' " . $swhere;
        $sql.= "GROUP BY u.iduser";
        // echo $sql;
        $jmluseracc = $this->db->query($sql)->getResultArray();

        $sql = "SELECT COUNT(DISTINCT m.idsubproduk) AS jml, m.idsubproduk, u.iduser
                    FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
                    LEFT JOIN $this->tableUser u ON (d.pic_ba = u.iduser OR d.pic_dev = u.iduser OR d.pic_qc = u.iduser OR d.pic_user = u.iduser)
                    LEFT JOIN it_modul m ON m.idmodul = d.idmodul
                    WHERE idproyekhistory IN (
                        (
                            SELECT MAX(idproyekhistory) 
                            FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                            WHERE (1=1) 
                            GROUP BY h.idproyekdetail
                        )
                    ) AND aksi = 'useraccept' " . $swhere;
        $sql.= "GROUP BY m.idsubproduk, u.iduser";
        // echo $sql;
        $jmluseraccmodul = $this->db->query($sql)->getResultArray();

        $sql = "SELECT COUNT(m.idsubproduk) AS jml, u.iduser, m.idsubproduk
                FROM it_modul m LEFT JOIN it_proyekdetail d on m.idmodul = d.idmodul
                LEFT JOIN it_proyek p ON p.idproyek = d.idproyek
                LEFT JOIN $this->tableUser u ON (d.pic_ba = u.iduser OR d.pic_dev = u.iduser OR d.pic_qc = u.iduser OR d.pic_user = u.iduser)
                GROUP BY u.iduser, m.idsubproduk";
        // echo $sql;
        $jmlsubproduk = $this->db->query($sql)->getResultArray();

        return array('data' => $data, 'jmlmodul' => $jmlmodul, 'jmluseracc' => $jmluseracc, 'jmluseraccmodul' => $jmluseraccmodul, 'jmlsubproduk' => $jmlsubproduk);

    }

    public function getUser()
    {
        return $this->db->table($this->tableUser)->get()->getResultArray();
    }
}
