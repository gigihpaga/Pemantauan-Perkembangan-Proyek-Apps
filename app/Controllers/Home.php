<?php

namespace App\Controllers;
use App\Models\m_home;

class Home extends BaseController
{
    protected $m_home;

    public function __construct()
    {
        if (!session()->get('username')) return redirect()->to(base_url());
        $this->m_home = new m_home();
    }

    public function index()
    {
        if (!session()->get('username')) return view('/layout/v_index');
        $idproyek = $this->request->getPost('idproyek');

    	$data = [
            'titlemenu' => 'Dashboard',
            'untukmenu' => null,
            'data_proyek' => $this->m_home->getProyek(),
            'data_real' => $this->m_home->getData($idproyek),
            'r_idproyek' => $idproyek,
        ];
    	return view('/master/v_home', $data);
    }
} 
?>