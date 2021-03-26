<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function storeNewProductWithImage($request)
    {
        $extension = $request->image->extension();

        $url = Storage::url($request->image->storeAs('/public', 'img' . Str::random(32) . "." . $extension));

        $product = Product::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'inventory' => $request->inventory ?? 0,
        ]);

        $product->images()->create([
            'url' => $url
        ]);
    }

    /**
     * @param $quantity
     * @return bool
     * @throws Exception
     */
    public function checkLeftover($quantity): bool
    {
        if((int)$this->inventory < (int)$quantity){
            throw new Exception('There is not enough inventory!');
        }

        return true;
    }

    public function deductInventory($quantity)
    {
        $newInventory = $this->inventory - $quantity;

        $this->update([
            'inventory' => $newInventory
        ]);

        $this->refresh();
    }

    public function addInventory($quantity)
    {
        $newInventory = $this->inventory + $quantity;

        $this->update([
            'inventory' => $newInventory
        ]);

        $this->refresh();
    }
}
