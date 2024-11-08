<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MenuAdminController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::all(); // Ambil data dari database
        return Inertia::render('MenuAdminView', [
            'menuItems' => $menuItems ?? []
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric', // Changed to numeric
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('menu_images', 'public');
        $validated['image'] = $path;

        MenuItem::create($validated);

        return Redirect::route('menu-admin.index')->with('success', 'Menu item added successfully');
    }

    public function update(Request $request, MenuItem $menuItem) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric', // Changed to numeric
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $dataUpdate = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ];

        if ($request->hasFile('image')) {
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }

            $path = $request->file('image')->store('menu_images', 'public');
            $dataUpdate['image'] = $path;
        }

        $menuItem->update($dataUpdate);

        return Redirect::route('menu-admin.index')->with('success', 'Menu item updated successfully');
    }

    public function destroy(MenuItem $menuItem) {
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        $menuItem->delete();
        return Redirect::route('menu-admin.index')->with('success', 'Menu item deleted successfully');
    }
}
