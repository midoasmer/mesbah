<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('order', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_whatsapp' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        Order::create($request->all());

        return redirect()
            ->route('success')
            ->with('success_title', 'تم إرسال طلبك بنجاح')
            ->with('success_body', 'استلمنا طلبك وسنتواصل معك في أقرب وقت.');
    }
}
