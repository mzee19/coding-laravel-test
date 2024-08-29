<?php

namespace App\Http\Controllers;

use App\Http\Service\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(public OrderService $orderService) {
    }

    public function index(Request $request) {
        $orders = $this->orderService->getOrderWithRelation($request);

        return view('orders.index')->with(['orders' => $orders, 'search' => $request->search]);
    }
}
