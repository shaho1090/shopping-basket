<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

    public function storeNewOrder($request)
    {
        $product = Product::find($request->product_id);
        $product->checkLeftover($request->order_quantity);

        $code = $this->generateCode();

        $order = auth()->user()->orders()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->order_quantity,
            'code' => $code
        ]);

        $product->deductInventory($request->order_quantity);

        return $order;
    }

    public function generateCode(): string
    {
        $code = (string)(rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9));

        $input = ['code' => $code];
        $rules = [
            'code' => 'unique:orders,code'
        ];

        $validate = Validator::make($input, $rules);

        if ($validate->passes()) {
            return $code;
        }

        return $this->generateCode();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function updateOrder($request): bool
    {
        $product = Product::find($this->product_id);

        if ($this->quantity > $request->order_quantity) {
            $product->addInventory($this->quantity - $request->order_quantity);
            return $this->update([
                'quantity' => $request->order_quantity
            ]);
        }

        if ($this->quantity < $request->order_quantity) {
            $product->checkLeftover($request->order_quantity - $this->quantity);
            $product->deductInventory($request->order_quantity - $this->quantity);
            return $this->update([
                'quantity' => $request->order_quantity
            ]);
        }

        return false;
    }

}
