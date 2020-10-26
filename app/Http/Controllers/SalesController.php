<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Products;
use App\Models\Stocks;
use Carbon\Carbon;

class SalesController extends Controller
{
    /**
     * List of the products
     *
     * @return View
     */
    public function index(Request $request)
    {

        $request->validate([
            'start_date' => 'date',
            'end_date' => 'date'
        ]);

        $sales = new Sales;

        $sales = $sales->when($request->has('start_date'), function ($query) use ($request) {
            $query->whereDate('created_at', '>=', Carbon::parse($request->start_date));
        })->when($request->has('end_date'), function ($query) use ($request) {
            $query->whereDate('created_at', '<=', Carbon::parse($request->end_date));
        });

        $sales = $sales->orderBy('created_at')->with('stock')->paginate(20);

        // return $sales;

        $total_profit = 0;
        $total_original_costs = 0;
        $total_viruchka = 0;

        foreach ($sales as $sale) {
            $total_profit += $sale->profit;
            $total_original_costs += $sale->original_cost;
            $total_viruchka += $sale->viruchka;
        }


        return view('sales.index', compact('sales', 'total_profit', 'total_original_costs', 'total_viruchka'));
    }

    /**
     * @param int $id
     * @return View
     */

    public function form($id = null)
    {
        $products = Products::orderBy('product_name')->pluck('product_name', 'id');
        $sales = [];
        if ($id) {
            $sales = Sales::findOrFail($id);
        }

        return view('sales.form', compact('sales', 'products'));
    }

    public function save(SalesRequest $request, $id = null)
    {
        $data = $request->except('_token');

        $stock = Stocks::where('product_id', $data['product_id'])->first();

        if ($stock && $stock->stock_amount >= $data['sale_amount']) {
            $stock->stock_amount = ($stock->stock_amount - $data['sale_amount']);
            $stock->save();
        } else {
            return back()->with('error', 'Не хватает товвров на складе');
        }

        if ($id) {
            $sales = Sales::findOrFail($id);
            $sales->update($data);
        } else {
            $sales = Sales::create($data);
        }

        return redirect()->route('sales.index')->with('success', 'Успех');
    }
}
