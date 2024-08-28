<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'price', 'total_price'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
