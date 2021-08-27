<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use App\Models\m_lappic;
use App\Models\m_mastersubproduk;
use App\Models\m_home;

class Lappic extends BaseController
{
    protected $m_lappic;
    protected $m_mastersubproduk;
    protected $m_home;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        $this->m_lappic = new m_lappic();
        $this->m_mastersubproduk = new m_mastersubproduk();
        $this->m_home = new m_home();
    }

    public function index()
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        $segment = $this->request->uri->getSegment(1);

        $idproyek = $iduser = $jabatan = $idsubproduk = "";

        $ckidproyek = $this->request->getPost('ckidproyek');
        if ($ckidproyek)
            $idproyek = $this->request->getPost('idproyek');
        $ckiduser = $this->request->getPost('ckiduser');
        if ($ckiduser)
            $iduser = $this->request->getPost('iduser');
        $ckjabatan = $this->request->getPost('ckjabatan');
        if ($ckjabatan)
            $jabatan = $this->request->getPost('jabatan');
        $ckidsubproduk = $this->request->getPost('ckidsubproduk');
        if ($ckidsubproduk)
            $idsubproduk = $this->request->getPost('idsubproduk');

        $data = [
            'titlemenu' => 'Laporan PIC Proyek',
            'data_lappengembangan' => $this->m_lappic->getLapPengembangan($idproyek, $jabatan, $iduser, $idsubproduk),
            'data_user' => $this->m_lappic->getUser(),
            'data_mastersubproduk' => $this->m_mastersubproduk->getMastersubproduk(),
            'data_proyek' => $this->m_home->getProyek(),
            'untukmenu' => $segment,
            'post' => $this->request->getPost(),
        ];

        return view('/master/v_lappic', $data);
    }


    //--------------------------------------------------------------------

}
