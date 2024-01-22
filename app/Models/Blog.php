<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = [
	'title',
	'slug',
	'description'
    ];
   
    public function images() {
	return $this->hasMany(related: "App\Models\BlogImage"); 
    }
}
