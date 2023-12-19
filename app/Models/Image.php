<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Progress;

class Image extends Model
{
    use HasFactory;
    protected $table="image";
    protected $fillable=['image_path','progress_id'];
    public function progress()
    {
       return $this->belongsTo(Progress::class);     
    }
}
