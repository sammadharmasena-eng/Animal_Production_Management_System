<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class ProductController extends Controller
{
    // Show product page (if needed)
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    // Handle "Buy Now" button
    public function buyProduct(Request $request)
    {
        $product_name = $request->input('product_name');
        $price = $request->input('price');

        // Redirect to sales form with product info
        return redirect()->route('sales.form', [
            'product_name' => $product_name,
            'price' => $price
        ]);
    }

    // Show the sales form with product info and sales records
    public function showSalesForm(Request $request)
    {
        $sales = Sale::latest()->get();
        $product_name = $request->input('product_name');
        $price = $request->input('price');

        return view('sales', compact('sales', 'product_name', 'price'));
    }

    // Handle sales submission
    public function submitSale(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'customer_name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
        ]);

        $total_price = $request->price * $request->quantity;

        $sale = new Sale();
        $sale->product_name = $request->product_name;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;
        $sale->total_price = $total_price;
        $sale->customer_name = $request->customer_name;
        $sale->contact = $request->contact;
        $sale->save();

        return redirect()->route('sales.form')->with('success', 'Sale recorded successfully!');
    }
}