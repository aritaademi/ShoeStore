<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    /** @use HasFactory<\Database\Factories\ShoeFactory> */
    use HasFactory;

    protected $fillable = ['brand_id', 'category_id', 'name', 'description', 'price', 'image'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);  //Defines a many-to-one relationship, belongsTo() links to the Brand model using the brand_id foreign key.
    }

    public function category()
    {
        return $this->belongsTo(Category::class);  //Defines a many-to-one relationship, belongsTo() links to the Category model using the category_id foreign key.
    }
}
