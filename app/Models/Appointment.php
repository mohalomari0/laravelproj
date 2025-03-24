<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_id',
        'appointment_date',
        'status',
    ];

    // العلاقة مع جدول المستخدمين
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع جدول الخدمات
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}