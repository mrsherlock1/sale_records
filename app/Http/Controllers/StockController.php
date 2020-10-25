<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Products;
use App\Models\Stocks;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stocks::orderBy('created_at', 'desc')->paginate(10);
        return view('stock.index', compact('stocks'));
    }

    public function form($id = null)
    {
        $products = Products::orderBy('product_name')->pluck('product_name', 'id');
        $stock = [];
        if ($id) {
            $stock = Stocks::findOrFail($id);
        }

        return view('stock.form', compact('stock', 'products'));
    }

    public function save(StockRequest $request, $id = null)
    {
        $data = $request->except('_token');

        if ($id) {
            $stock = Stocks::findOrFail($id);
            $stock->update($data);
        } else {
            $stock = Stocks::create($data);
        }

        return redirect()->route('stock.index')->with('success', 'Успех');
    }

    public function delete($id)
    {
    }
}
