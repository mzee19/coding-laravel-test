<?php

namespace App\Http\Service;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderService
{
    public function getOrderWithRelation(Request $request)
    {
        $query = Order::with(['customer','items']);

        if($request->has('search')) {
            $search = $request->input('search');
            $query->when($search, function ($query) use ($search) {
                $query->where('order_number', 'like', '%' . $search . '%')
                    ->orWhereHas('customer', function ($q) use ($search) {
                        $q->where('email', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('items', function ($q) use ($search) {
                        $q->where('product_name', 'like', '%' . $search . '%');
                    });
            });
        }

        return $query->paginate(10);
    }
}
