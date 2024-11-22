<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index() {
        $order = Order::join('menu_items', 'order.menu_item_id', '=', 'menu_items.id')->join('users', 'order.user_id', '=', 'users.id')->get(['order.id', 'users.name as customerName', 'menu_items.name', 'order.quantity', 'order.status']);
        return Inertia::render('OrderView', [
            'data' => $order,
        ]);
    }

    public function editOrder(Request $request) {
        Order::where('id', $request->id)->update([
            "status" => $request->status
        ]);

        $order = Order::join('menu_items', 'order.menu_item_id', '=', 'menu_items.id')->join('users', 'order.user_id', '=', 'users.id')->get(['order.id', 'users.name as customerName', 'menu_items.name', 'order.quantity', 'order.status']);

        return response()->json([
            "data" => $order
        ]);
    }

    public function deleteOrder(Request $request) {
        Order::where('id', $request->id)->delete();

        $order = Order::join('menu_items', 'order.menu_item_id', '=', 'menu_items.id')->join('users', 'order.user_id', '=', 'users.id')->get(['order.id', 'users.name as customerName', 'menu_items.name', 'order.quantity', 'order.status']);

        return response()->json([
            "data" => $order
        ]);
    }
}
