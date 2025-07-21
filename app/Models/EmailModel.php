<?php
namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table      = 'emails';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mailTo', 'subject', 'message', 'sent_at'];
}