<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    use HasFactory;
    protected $table="sanction";
    protected $fillable=['sanction_fy','district','block','gp','newgp','sanction_amt','sanction_date','sanction_head','sanction_purpose'];
}
