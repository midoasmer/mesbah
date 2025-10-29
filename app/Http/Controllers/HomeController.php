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
        
        // Default category images array
        $categoryImages = [
            'Jewelry.jpg',
            'Office Supplies.jpg', 
            '8814e9ecf587a74bdede675df9e46b172ee98e06.jpg',
            '5e659c1429e4cd10f7fc9a02d8159057d7906a24.jpg',
            'beauty.jpg',
            'health.jpg',
            'musical.jpg',
            'clothing.jpg',
            'electronics.jpg',
            'toys.jpg'
        ];
        
        return view('home', compact('categories', 'products', 'categoryImages'));
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
