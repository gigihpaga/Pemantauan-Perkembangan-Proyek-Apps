<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use App\Models\m_proyek;

class Proyek extends BaseController
{
    protected $m_proyek;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $this->m_proyek = new m_proyek();
    }

    public function index()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $segment = $this->request->uri->getSegment(1);
        $data = [
            'titlemenu' => 'Kelola Proyek',
            'data_proyek' => $this->m_proyek->getProyek(),
            'data_detailproyek' => $this->m_proyek->getDetailProyek(),
            'data_tipeproyek' => $this->m_proyek->getTipeProyek(),
            'data_modul' => $this->m_proyek->getModul(),
            'data_user_ba' => $this->m_proyek->getUser('ba'),
            'data_user_dev' => $this->m_proyek->getUser('dev'),
            'data_user_qc' => $this->m_proyek->getUser('qc'),
            'data_user_user' => $this->m_proyek->getUser('user'),
            'untukmenu' => $segment
        ];

        return view('/master/v_proyek', $data);
    }

    // action insert data
    public function add()
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        if (!$this->validate([
            'namaproyek' => 'required',
            'tahun' => 'required',
            'idtipeproyek' => 'required',
        ])) {
            return redirect()->to(base_url() . '/proyek');
            session()->setFlashdata('pesan', 'Data gagal disimpan');
        }

        // dd($this->request->getPost());
        $datadariform = [
            'namaproyek' => $this->request->getPost('namaproyek'),
            'tahun' => $this->request->getPost('tahun'),
            'idtipeproyek' => $this->request->getPost('idtipeproyek'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'createby' => session()->get('username'),
            'createdate' => date("Y-m-d H:i:s"),
        ];
        $this->m_proyek->insertketabel($datadariform);

        // get idproyek
        $idproyek = $this->m_proyek->last_id();

        $detailCount = count($this->request->getPost('idmodul'));
        for ($i = 0; $i < $detailCount; $i++) {
            if ($this->request->getPost('idmodul')[$i]) {
                $datadariform = [
                    'idproyek' => $idproyek,
                    'idmodul' => $this->request->getPost('idmodul')[$i],
                    'sprint' => $this->request->getPost('sprint')[$i],
                    'pic_ba' => $this->request->getPost('pic_ba')[$i],
                    'pic_dev' => $this->request->getPost('pic_dev')[$i],
                    'pic_qc' => $this->request->getPost('pic_qc')[$i],
                    'pic_user' => $this->request->getPost('pic_user')[$i],
                    'deskripsi' => $this->request->getPost('deskripsidet')[$i],
                    'createby' => session()->get('username'),
                    'createdate' => date("Y-m-d H:i:s"),
                ];
                $this->m_proyek->insertketabeldetail($datadariform);
            }
        }

        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url() . '/proyek');
    }

    public function edit($iddariform)
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $datadariform = [
            'namaproyek' => $this->request->getPost('namaproyek'),
            'tahun' => $this->request->getPost('tahun'),
            'idtipeproyek' => $this->request->getPost('idtipeproyek'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'modifby' => session()->get('username'),
            'modifdate' => date("Y-m-d H:i:s"),
        ];
        $this->m_proyek->updateketabel($iddariform, $datadariform);

        // hapus detail
        $this->m_proyek->deleteketabeldetail($iddariform);

        $idproyek = $iddariform;

        $detailCount = count($this->request->getPost('idmodul'));
        for ($i = 0; $i < $detailCount; $i++) {
            if ($this->request->getPost('idmodul')[$i]) {
                $datadariform = [
                    'idproyek' => $idproyek,
                    'idmodul' => $this->request->getPost('idmodul')[$i],
                    'sprint' => $this->request->getPost('sprint')[$i],
                    'pic_ba' => $this->request->getPost('pic_ba')[$i],
                    'pic_dev' => $this->request->getPost('pic_dev')[$i],
                    'pic_qc' => $this->request->getPost('pic_qc')[$i],
                    'pic_user' => $this->request->getPost('pic_user')[$i],
                    'deskripsi' => $this->request->getPost('deskripsidet')[$i],
                    'createby' => session()->get('username'),
                    'createdate' => date("Y-m-d H:i:s"),
                ];
                $this->m_proyek->insertketabeldetail($datadariform);
            }
        }

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url() . '/proyek');
    }

    public function delete($iddariform)
    {
        if (!session()->get('username')) return redirect()->to(base_url());

        $this->m_proyek->deleteketabeldetail($iddariform);
        $this->m_proyek->deleteketabel($iddariform);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url() . '/proyek');
    }



    //--------------------------------------------------------------------

}
