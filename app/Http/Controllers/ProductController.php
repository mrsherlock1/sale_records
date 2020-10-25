<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * List of the products
     *
     * @return View
     */
    public function index()
    {
        $products = Products::orderBy('product_name')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * @param int $id
     * @return View
     */

    public function form($id = null)
    {
        $product = [];
        if ($id) {
            $product = Products::findOrFail($id);
        }

        return view('products.form', compact('product'));
    }

    public function save(Request $request, $id = null)
    {
        $data = $request->validate([
            'product_name' => 'required',
        ]);

        if ($id) {
            $stock = Products::findOrFail($id);
            $stock->update($data);
        } else {
            $stock = Products::create($data);
        }

        return redirect()->route('product.index')->with('success', 'Успех');
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        if ($product) {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Успех');
        }
    }
}
