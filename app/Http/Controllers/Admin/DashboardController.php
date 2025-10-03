<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_requests' => UserRequest::count(),
            'pending_requests' => UserRequest::where('status', 'pending')->count(),
        ];

        $recent_orders = Order::with('product')->latest()->take(5)->get();
        $recent_requests = UserRequest::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_orders', 'recent_requests'));
    }
}
