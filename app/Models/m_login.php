<?php

namespace App\Models;

use CodeIgniter\Model;

class m_login extends Model
{
    protected $table      = 'it_users';

    public function getDataLogin($username, $password)
    {
        $password = md5($password);
        return $this->where(['username' => $username, 'password' => $password])->first();
        // return $this->db->getLastQuery('finalQueryString');
    }
}
