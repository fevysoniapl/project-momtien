<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;
use Redirect;

class BookController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('BookView', [
            'menu' => $request->get('menu')
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'quantity' => 'integer|required|min:1|gt:0'
        ]);

        $menu = MenuItem::find($request->id);
        $user = Auth::user()->id;
        $status = "Menunggu Pembayaran";
        $total = $menu->price * $request->quantity;

        Order::insert([
            'menu_item_id' => $menu->id,
            'user_id' => $user,
            'quantity' => $request->quantity,
            'status' => $status,
            'total_price' => $total,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            "url" => route('order-history')
        ]);
    }
}
