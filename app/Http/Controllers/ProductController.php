<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    // View Functions
    public function index() {
        $user = Auth::user();

        $products = $user->products;

        return view('home', ['user' => $user,'products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function edit(Product $product) {
        $this->authorize('performAction', $product);

        return view('products.edit', ['product' => $product]);
    }

    // Database Manipulation Functions
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $data['user_id'] = auth()->id();

        $product = Product::create($data);

        return redirect(route('home'));
    }

    public function update(Product $product, Request $request) {
        $this->authorize('performAction', $product);

        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);
        return redirect(route('home'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product) {
        $this->authorize('performAction', $product);

        $product->delete();

        return redirect(route('home'));
    }
}
