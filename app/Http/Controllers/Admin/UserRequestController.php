<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    public function index()
    {
        $requests = UserRequest::latest()->paginate(10);
        return view('admin.user-requests.index', compact('requests'));
    }

    public function show(UserRequest $userRequest)
    {
        return view('admin.user-requests.show', compact('userRequest'));
    }

    public function updateStatus(Request $request, UserRequest $userRequest)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $userRequest->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

    public function destroy(UserRequest $userRequest)
    {
        $userRequest->delete();
        return redirect()->route('admin.user-requests.index')->with('success', 'تم حذف الطلب بنجاح');
    }
}
