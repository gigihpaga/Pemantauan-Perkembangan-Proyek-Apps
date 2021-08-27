<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use App\Models\m_pekerjaan;

class Pekerjaan extends BaseController
{
    protected $m_pekerjaan;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        $this->m_pekerjaan = new m_pekerjaan();
    }

    public function index()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $segment = $this->request->uri->getSegment(1);

        switch (session()->get('role')) {
            case 'ba':
                $title = 'Dokumentasi';
                $column = 'pic_ba';
                break;
            case 'dev':
                $title = 'Development';
                $column = 'pic_dev';
                break;
            case 'qc':
                $title = 'Quality Control';
                $column = 'pic_qc';
                break;
            case 'user':
            default:
                $title = 'User Accepted';
                $column = 'pic_user';
                break;
        }

        $data = [
            'titlemenu' => $title,
            'data_pekerjaan' => $this->m_pekerjaan->getPekerjaan($column),
            'untukmenu' => $segment
        ];

        return view('/master/v_pekerjaan', $data);
    }

    public function progress($iddariform, $aksi)
    {
        if (!session()->get('username')) return redirect()->to(base_url());

         $datadariform = [
            'idproyekdetail' => $iddariform,
            'pic' => session()->get('username'),
            'role' => session()->get('role'),
            'aksi' => $aksi,
            'createby' => session()->get('username'),
            'createdate' => date("Y-m-d H:i:s"),
        ];
        // dd($datadariform); die();
        $this->m_pekerjaan->insertketabel($datadariform);

        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url() . '/pekerjaan');
    }

    //--------------------------------------------------------------------

}
