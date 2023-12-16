<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $table="progress";
    protected $fillable=['completion_percentage','p_update','p_isComplete','p_uc','p_image','sanction_id','remarks'];
}
