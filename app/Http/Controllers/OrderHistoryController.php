<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderHistoryController extends Controller
{
    public function index() {
        $order = Order::join('menu_items', 'order.menu_item_id', '=', 'menu_items.id')
            ->join('users', 'order.user_id', '=', 'users.id')
            ->where('users.id', \Auth::user()->id)
            ->get(['order.id', 'order.created_at', 'menu_items.name', 'order.total_price', 'menu_items.price', 'order.quantity', 'order.status']);
        return Inertia::render('OrderHistoryView', [
            'data' => $order
        ]);
    }
}
