<?php
namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class MenuController extends Controller
{
    // Fetch all menu items for the public view
    public function index()
    {
        // Ambil semua menu items dan sesuaikan strukturnya
        $menuItems = MenuItem::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description,
                'price' => $item->price,
                'image' => $item->image ? Storage::url($item->image) : null,
            ];
        });

        return Inertia::render('MenuView', [
            'menuCategories' => [
                [
                    'name' => 'Ayam dan Bebek',
                    'items' => $menuItems,
                ],
            ],
        ]);

        
    }
}
?>