<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('products')->get();
        
        // فلتر المنتجات حسب الفئة
        $query = Product::where('is_active', true)->with('category');
        
        if ($request->category) {
            $query->where('category_id', $request->category);
        }
        
        $products = $query->paginate(12);
        
        return view('home', compact('categories', 'products'));
    }

    public function products(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');
        
        if ($request->category) {
            $query->where('category_id', $request->category);
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
        return view('products', compact('products', 'categories'));
    }

    public function product(Product $product)
    {
        return view('product', compact('product'));
    }
}
