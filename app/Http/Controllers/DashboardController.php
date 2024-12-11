<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user && $user->role === 'admin') {
            // Total income
            $totalIncome = Order::where('status', 'Pesanan Selesai')
                ->groupBy('status')
                ->select('status', DB::raw('SUM(total_price) as total_price_sum'))
                ->first();

            // Total orders count
            $totalOrder = Order::where('status', 'Pesanan Selesai')->count();

            // Recent orders
            $recentOrder = Order::join('users', 'order.user_id', '=', 'users.id')
                ->orderByDesc('order.created_at')
                ->take(10)
                ->get(['order.id', 'users.name', 'order.status', 'order.total_price', 'order.created_at'])
                ->toArray();

            // Most ordered
            $mostOrdered = Order::join('menu_items', 'order.menu_item_id', '=', 'menu_items.id')
                ->where('order.status', 'Pesanan Selesai')
                ->select('menu_items.name', DB::raw('COUNT(order.menu_item_id) as count'))
                ->groupBy('menu_items.name')
                ->orderByDesc('count')
                ->get(['menu_items.name', 'count'])
                ->toArray();

            // Kirim data ke view
            return Inertia::render('DashboardView', [
                'income' => $totalIncome->total_price_sum,
                'order' => $totalOrder,
                'recentOrder' => $recentOrder,
                'mostOrdered' => $mostOrdered,
            ]);
        }
        
        return redirect()->route('landing')->with('error', 'Unauthorized access.');
    }
}
?>