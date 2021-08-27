<?php

namespace App\Models;

use CodeIgniter\Model;

class m_home extends Model
{
    protected $table = 'it_proyek';

    public function getProyek()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function getData($idproyek)
    {
    	$swhere = "";
    	if ($idproyek)
    		$swhere = " AND idproyek = '$idproyek' ";

    	$sql = "SELECT COUNT(idproyekdetail) AS jml FROM it_proyekdetail WHERE (1=1) " . $swhere;
    	$jml_modul = $this->db->query($sql)->getRow()->jml;

    	/*$sql = "SELECT COUNT(x.idproyekdetail) AS jml 
    			FROM (SELECT idproyekdetail, aksi FROM it_proyekhistory ORDER BY idproyekhistory DESC LIMIT 1) AS x
    			WHERE (x.aksi IS null OR x.aksi = 'docprogres' OR x.aksi = 'devprogres' OR x.aksi = 'qcprogres' OR x.aksi = 'qcfailed' OR x.aksi = 'userreject')
    			AND x.idproyekdetail IN (SELECT idproyekdetail FROM it_proyekdetail WHERE (1=1) " . $swhere . ")";*/
        $sql = "SELECT SUM(z.jml) AS jml
                FROM (SELECT COUNT(d.idproyekdetail) AS jml
                                    FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
                                    WHERE idproyekhistory IN (
                                        (
                                            SELECT MAX(idproyekhistory) 
                                            FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                                            WHERE (1=1) " . $swhere . " 
                                            GROUP BY h.idproyekdetail
                                        )
                                    ) AND (aksi IN ('docprogres','docdone','devprogres','devdone','qcprogres','qcfailed','userreject') )
                                    GROUP BY aksi) AS z"; //echo $sql;
    	$sts_proses = empty($this->db->query($sql)->getResultArray()) ? 0 : $this->db->query($sql)->getRow()->jml;

        $sql = "SELECT COUNT(idproyekdetail) AS jml
                FROM it_proyekdetail WHERE idproyekdetail NOT IN (SELECT idproyekdetail FROM it_proyekhistory)" . $swhere;
        $sts_progress_notnull = empty($this->db->query($sql)->getResultArray()) ? 0 : $this->db->query($sql)->getRow()->jml;

    	/*$sql = "SELECT COUNT(x.idproyekdetail) AS jml 
    			FROM (SELECT idproyekdetail, aksi FROM it_proyekhistory ORDER BY idproyekhistory DESC LIMIT 1) AS x
    			WHERE (x.aksi = 'qcaccept')
    			AND x.idproyekdetail IN (SELECT idproyekdetail FROM it_proyekdetail WHERE (1=1) " . $swhere . ")";*/
        $sql = "SELECT COUNT(d.idproyekdetail) AS jml
                    FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
                    WHERE idproyekhistory IN (
                        (
                            SELECT MAX(idproyekhistory) 
                            FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                            WHERE (1=1) " . $swhere . " 
                            GROUP BY h.idproyekdetail
                        )
                                            ) AND aksi = 'qcaccept'
                    GROUP BY aksi"; // echo $sql;
    	$sts_qcaccepted = empty($this->db->query($sql)->getResultArray()) ? 0 : $this->db->query($sql)->getRow()->jml;

    	/*$sql = "SELECT COUNT(x.idproyekdetail) AS jml 
    			FROM (SELECT idproyekdetail, aksi FROM it_proyekhistory ORDER BY idproyekhistory DESC LIMIT 1) AS x
    			WHERE (x.aksi = 'useraccept')
    			AND x.idproyekdetail IN (SELECT idproyekdetail FROM it_proyekdetail WHERE (1=1) " . $swhere . ")";*/
        $sql = "SELECT COUNT(d.idproyekdetail) AS jml
                    FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
                    WHERE idproyekhistory IN (
                        (
                            SELECT MAX(idproyekhistory) 
                            FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                            WHERE (1=1) " . $swhere . " 
                            GROUP BY h.idproyekdetail
                        )
                    ) AND aksi = 'useraccept'
                    GROUP BY aksi";
    	$sts_useraccepted = empty($this->db->query($sql)->getResultArray()) ? 0 : $this->db->query($sql)->getRow()->jml;

    	$sql = "SELECT iduser, COUNT(idproyekdetail) AS jml, namauser
    			FROM it_users u LEFT JOIN it_proyekdetail d ON u.iduser = d.pic_ba
    			WHERE jabatan = 'ba' " . $swhere . " GROUP BY iduser";
    	$data_ba = $this->db->query($sql)->getResultArray();

    	$sql = "SELECT DISTINCT h.aksi, COALESCE(x.jmlmodul,0) AS jml
				FROM it_proyekhistory h LEFT JOIN (
					SELECT aksi, COUNT(d.idmodul) AS jmlmodul
					FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON h.idproyekdetail = d.idproyekdetail
					WHERE idproyekhistory IN (
						(
                            SELECT MAX(idproyekhistory) 
                            FROM it_proyekhistory h LEFT JOIN it_proyekdetail d ON d.idproyekdetail = h.idproyekdetail 
                            WHERE (1=1) " . $swhere . " 
                            GROUP BY h.idproyekdetail
                        )
											)
					GROUP BY aksi) x ON h.aksi = x.aksi";
    	$data_sts_modul = $this->db->query($sql)->getResultArray();

    	return array(
    					'jml_modul' => $jml_modul, 
    					'sts_proses' => ($sts_proses > 0 ? ((($sts_proses+$sts_progress_notnull)/$jml_modul)*100) : 0) . '%', 
    					'sts_qcaccepted' => ($sts_qcaccepted > 0 ? (($sts_qcaccepted/$jml_modul)*100) : 0) . '%',
    					'sts_useraccepted' => ($sts_useraccepted > 0 ? (($sts_useraccepted/$jml_modul)*100) : 0) . '%',
    					'data_ba' => $data_ba,
    					'data_sts_modul' => $data_sts_modul,
    				);
    	// echo  $this->db->getLastQuery('finalQueryString');
    }
}
