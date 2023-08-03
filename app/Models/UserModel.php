<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_users';
    protected $allowedFields = [ 'username', 'password', 'email', 'role_id'];
}
