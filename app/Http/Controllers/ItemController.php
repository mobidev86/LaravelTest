<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:items|max:255',
        ]);

        Item::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|unique:items|max:255',
        ]);

        $item->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
    }

    public function destroy(Item $item)
    {
        $item->delete();
    }
}