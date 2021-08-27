<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use App\Models\m_lappengembangan;
use App\Models\m_proyek;
use App\Models\m_masterproduk;
use App\Models\m_mastersubproduk;
use App\Models\m_home;

class Lappengembangan extends BaseController
{
    protected $m_lappengembangan;
    protected $m_proyek;
    protected $m_masterproduk;
    protected $m_mastersubproduk;
    protected $m_home;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        $this->m_lappengembangan = new m_lappengembangan();
        $this->m_proyek = new m_proyek();
        $this->m_masterproduk = new m_masterproduk();
        $this->m_mastersubproduk = new m_mastersubproduk();
        $this->m_home = new m_home();
    }

    public function index()
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        $segment = $this->request->uri->getSegment(1);

        $idproyek = $tahun = $idtipeproyek = $idsubproduk = "";

        $ckidproyek = $this->request->getPost('ckidproyek');
        if ($ckidproyek)
            $idproyek = $this->request->getPost('idproyek');
        $cktahun = $this->request->getPost('cktahun');
        if ($cktahun)
            $tahun = $this->request->getPost('tahun');
        $ckidtipeproyek = $this->request->getPost('ckidtipeproyek');
        if ($ckidtipeproyek)
            $idtipeproyek = $this->request->getPost('idtipeproyek');
        $ckidsubproduk = $this->request->getPost('ckidsubproduk');
        if ($ckidsubproduk)
            $idsubproduk = $this->request->getPost('idsubproduk');

        $data = [
            'titlemenu' => 'Laporan Pengembangan',
            'data_lappengembangan' => $this->m_lappengembangan->getLapPengembangan($idproyek, $tahun, $idtipeproyek, $idsubproduk),
            'data_tipeproyek' => $this->m_proyek->getTipeProyek(),
            'data_mastersubproduk' => $this->m_mastersubproduk->getMastersubproduk(),
            'data_proyek' => $this->m_home->getProyek(),
            'untukmenu' => $segment,
            'post' => $this->request->getPost(),
        ];

        return view('/master/v_lappengembangan', $data);
    }


    //--------------------------------------------------------------------

}
