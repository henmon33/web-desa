<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'tb_users';
    protected $allowedFields = ['username', 'password', 'role_id'];
    


}
