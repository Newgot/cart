<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameProduct',
        'idCategory',
        'image',
        'description',
        'price'
    ];

    public function scopeCreateProduct($querry, $request)
    {
        $img = $request->file('image');
        $img->store('images', 'public');
        $querry->create([
            'nameProduct' => $request->nameProduct,
            'idCategory' => $request->idCategory,
            'description' => $request->description,
            'image' => $img->hashName(),
            'price' => $request->price
        ]);
    }

    public function scopeGetCategoryProducts($querry, $idCategory)
    {
        return $querry
            ->where('idCategory', $idCategory)
            ->get()
            ->toArray();
    }
}
