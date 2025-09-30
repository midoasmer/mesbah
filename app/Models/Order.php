<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_whatsapp',
        'product_id',
        'status',
        'notes',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'قيد الانتظار',
            'contacted' => 'تم التواصل',
            'confirmed' => 'تم التأكيد',
            'cancelled' => 'تم الإلغاء',
            'in_progress' => 'جارى العمل على الطلب',
            default => $this->status,
        };
    }
}
