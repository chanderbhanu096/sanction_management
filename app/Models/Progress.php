<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Progress extends Model
{
    use HasFactory;
    protected $table="progress";
    protected $fillable=['completion_percentage','p_update','p_isComplete','p_uc','p_image','sanction_id','remarks'];

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
