<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'cover',
        'price',
    ];

    // Đảm bảo rằng deleted_at được nhận diện là kiểu Carbon
    // protected $dates = ['deleted_at']; 
    
    
    public function images() {
        return $this -> hasMany(Image::class);
    }

    public function user() {
        return $this -> belongsTo(User::class);
    }

}
