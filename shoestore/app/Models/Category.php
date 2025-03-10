<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function shoes()
    {
        return $this->hasMany(Shoe::class);  //Defines a one-to-many relationship with the Shoe model
    }
}
