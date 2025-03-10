<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function shoes()
    {
        return $this->hasMany(Shoe::class); //This creates a one-to-many relationship with the Shoe model.
    }
}
