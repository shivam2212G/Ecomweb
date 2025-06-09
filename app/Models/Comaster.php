<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comaster extends Model
{
    use HasFactory;
    protected $table = 'comaster';
    protected $primaryKey = 'bill_id';

}
