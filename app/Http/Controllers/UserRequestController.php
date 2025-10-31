<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    public function create()
    {
        return view('user-request');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_whatsapp' => 'required|string',
            'request_type' => 'required|in:category,product',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        UserRequest::create($request->all());

        return redirect()
            ->route('success')
            ->with('success_title', 'تم إرسال طلبك بنجاح')
            ->with('success_body', 'سنراجع طلبك ونوافيك بالنتيجة قريباً.');
    }
}
