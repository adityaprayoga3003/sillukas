<?php 
namespace App\Models;

use CodeIgniter\Model;

class IncomeModel extends Model
{
    protected $table        = 'income';
    protected $allowedFields = ['id','total_harga'];
    protected $useTimestamps = true;
    // protected $useSoftDeletes = true;
}
