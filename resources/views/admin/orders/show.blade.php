@extends('layouts.admin')

@section('title', 'تفاصيل الطلب')
@section('page-title', 'تفاصيل الطلب')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>تفاصيل الطلب #{{ $order->id }}</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>اسم العميل:</strong></div>
                    <div class="col-sm-9">{{ $order->customer_name }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>البريد الإلكتروني:</strong></div>
                    <div class="col-sm-9">{{ $order->customer_email }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>رقم الهاتف:</strong></div>
                    <div class="col-sm-9">{{ $order->customer_phone }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>رقم الواتساب:</strong></div>
                    <div class="col-sm-9">{{ $order->customer_whatsapp }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>المنتج:</strong></div>
                    <div class="col-sm-9">{{ $order->product->name }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>السعر:</strong></div>
                    <div class="col-sm-9">{{ number_format($order->product->price, 2) }} جنيه</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>تاريخ الطلب:</strong></div>
                    <div class="col-sm-9">{{ $order->created_at->format('Y-m-d H:i:s') }}</div>
                </div>
                
                @if($order->notes)
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>ملاحظات:</strong></div>
                        <div class="col-sm-9">{{ $order->notes }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>تحديث حالة الطلب</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">الحالة الحالية</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                            <option value="contacted" {{ $order->status == 'contacted' ? 'selected' : '' }}>تم التواصل</option>
                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>تم التأكيد</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>تم الإلغاء</option>
                            <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>جارى العمل على الطلب</option>
                        </select>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">تحديث الحالة</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5>إجراءات سريعة</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="https://wa.me/{{ $order->customer_whatsapp }}" target="_blank" class="btn btn-success">
                        <i class="fab fa-whatsapp"></i> التواصل عبر الواتساب
                    </a>
                    <a href="tel:{{ $order->customer_phone }}" class="btn btn-info">
                        <i class="fas fa-phone"></i> الاتصال
                    </a>
                    <a href="mailto:{{ $order->customer_email }}" class="btn btn-warning">
                        <i class="fas fa-envelope"></i> إرسال إيميل
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">العودة للقائمة</a>
</div>
@endsection
