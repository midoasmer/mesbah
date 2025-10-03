@extends('layouts.admin')

@section('title', 'طلبات المستخدمين')
@section('page-title', 'طلبات المستخدمين')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>طلبات المستخدمين</h4>
</div>

<div class="card">
    <div class="card-body">
        @if($requests->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>اسم العميل</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الواتساب</th>
                            <th>نوع الطلب</th>
                            <th>عنوان الطلب</th>
                            <th>الحالة</th>
                            <th>التاريخ</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->customer_name }}</td>
                                <td>{{ $request->customer_email }}</td>
                                <td>{{ $request->customer_whatsapp }}</td>
                                <td>
                                    <span class="badge bg-{{ $request->request_type == 'category' ? 'info' : 'success' }}">
                                        {{ $request->request_type == 'category' ? 'فئة خدمة' : 'منتج' }}
                                    </span>
                                </td>
                                <td>{{ Str::limit($request->title, 30) }}</td>
                                <td>
                                    <span class="badge bg-{{ $request->status == 'pending' ? 'warning' : ($request->status == 'approved' ? 'success' : 'danger') }}">
                                        {{ $request->status == 'pending' ? 'في الانتظار' : ($request->status == 'approved' ? 'موافق عليه' : 'مرفوض') }}
                                    </span>
                                </td>
                                <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.user-requests.show', $request) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> عرض
                                    </a>
                                    <form action="{{ route('admin.user-requests.destroy', $request) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> حذف
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center">
                {{ $requests->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-user-plus fa-3x text-muted"></i>
                <p class="text-muted mt-2">لا توجد طلبات من المستخدمين حالياً</p>
            </div>
        @endif
    </div>
</div>
@endsection
