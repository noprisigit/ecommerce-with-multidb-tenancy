<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['name', 'description', 'price', 'quantity', 'image_path', 'is_active'];

    protected $appends = ['full_image_path'];

    protected function fullImagePath(): Attribute
    {
        return new Attribute(
            get: fn() => asset($this->image_path),
        );
    }
}
