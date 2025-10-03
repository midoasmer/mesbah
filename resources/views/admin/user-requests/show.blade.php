@extends('layouts.admin')

@section('title', 'تفاصيل طلب المستخدم')
@section('page-title', 'تفاصيل طلب المستخدم')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>تفاصيل الطلب</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>اسم العميل:</strong></div>
                    <div class="col-sm-9">{{ $userRequest->customer_name }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>البريد الإلكتروني:</strong></div>
                    <div class="col-sm-9">{{ $userRequest->customer_email }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>رقم الواتساب:</strong></div>
                    <div class="col-sm-9">{{ $userRequest->customer_whatsapp }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>نوع الطلب:</strong></div>
                    <div class="col-sm-9">
                        <span class="badge bg-{{ $userRequest->request_type == 'category' ? 'info' : 'success' }}">
                            {{ $userRequest->request_type == 'category' ? 'فئة خدمة' : 'منتج' }}
                        </span>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>عنوان الطلب:</strong></div>
                    <div class="col-sm-9">{{ $userRequest->title }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>وصف الطلب:</strong></div>
                    <div class="col-sm-9">{{ $userRequest->description }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>الحالة:</strong></div>
                    <div class="col-sm-9">
                        <span class="badge bg-{{ $userRequest->status == 'pending' ? 'warning' : ($userRequest->status == 'approved' ? 'success' : 'danger') }}">
                            {{ $userRequest->status == 'pending' ? 'في الانتظار' : ($userRequest->status == 'approved' ? 'موافق عليه' : 'مرفوض') }}
                        </span>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>تاريخ الطلب:</strong></div>
                    <div class="col-sm-9">{{ $userRequest->created_at->format('Y-m-d H:i:s') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>تحديث الحالة</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user-requests.update-status', $userRequest) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">الحالة</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending" {{ $userRequest->status == 'pending' ? 'selected' : '' }}>في الانتظار</option>
                            <option value="approved" {{ $userRequest->status == 'approved' ? 'selected' : '' }}>موافق عليه</option>
                            <option value="rejected" {{ $userRequest->status == 'rejected' ? 'selected' : '' }}>مرفوض</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">تحديث الحالة</button>
                </form>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-body">
                <a href="{{ route('admin.user-requests.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> العودة للقائمة
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
