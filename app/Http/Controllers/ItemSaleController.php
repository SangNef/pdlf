<?php

namespace App\Http\Controllers;

use App\Models\ItemSale;
use Illuminate\Http\Request;

class ItemSaleController extends Controller
{
    public function index()
    {
        $itemSales = ItemSale::all();
        return view('item_sales.index', compact('itemSales'));
    }

    public function create()
    {
        return view('item_sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_code' => ['required', 'regex:/^[a-zA-Z0-9]+$/'], // Alphanumeric only
            'item_name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'], // Alphanumeric and spaces
            'quantity' => 'required|integer',
            'expiry_date' => 'required|date',
        ]);

        ItemSale::create($request->all());

        return redirect()->route('item_sales.index')
            ->with('success', 'Item Sale created successfully.');
    }

    public function edit(ItemSale $itemSale)
    {
        return view('item_sales.edit', compact('itemSale'));
    }

    public function update(Request $request, ItemSale $itemSale)
    {
        $request->validate([
            'item_code' => ['required', 'regex:/^[a-zA-Z0-9]+$/'], // Alphanumeric only
            'item_name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'], // Alphanumeric and spaces
            'quantity' => 'required|integer',
            'expiry_date' => 'required|date',
        ]);

        $itemSale->update($request->all());

        return redirect()->route('item_sales.index')
            ->with('success', 'Item Sale updated successfully');
    }

    public function destroy(ItemSale $itemSale)
    {
        $itemSale->delete();

        return redirect()->route('item_sales.index')
            ->with('success', 'Item Sale deleted successfully');
    }
}
