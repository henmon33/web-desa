<?php

namespace App\Models;

use CodeIgniter\Model;

class SejarahModel extends Model
{
    protected $table      = 'tb_sejarah';
    protected $allowedFields = ['id','deskripsi'];
}
