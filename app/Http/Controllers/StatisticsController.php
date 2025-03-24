<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        // 1. الإحصائيات الأساسية
        $stats = [
            'total_users' => User::count(),
            'new_users' => User::whereDate('created_at', '>=', now()->subMonth())->count(),
            'total_appointments' => Appointment::count(),
            'completed_appointments' => Appointment::where('status', 'completed')->count(),
            'total_services' => Service::count(),
        ];

        // 2. إحصائيات المواعيد
        $appointmentStats = [
            'by_status' => Appointment::groupBy('status')
                ->select('status', DB::raw('count(*) as count'))
                ->get()
                ->pluck('count', 'status'),
            
            'by_service' => Service::withCount('appointments')
                ->orderBy('appointments_count', 'desc')
                ->take(5)
                ->get(),
            
            'monthly_trend' => Appointment::select(
                DB::raw('MONTH(appointment_date) as month'),
                DB::raw('YEAR(appointment_date) as year'),
                DB::raw('count(*) as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get(),
        ];

        // 3. الإحصائيات المالية
        $financialStats = [
            'total_revenue' => Service::join('appointments', 'services.id', '=', 'appointments.service_id')
                ->where('appointments.status', 'completed')
                ->sum('services.price'),
            
            'avg_revenue' => Service::join('appointments', 'services.id', '=', 'appointments.service_id')
                ->where('appointments.status', 'completed')
                ->avg('services.price')
        ];

        return view('statistics.index', compact('stats', 'appointmentStats', 'financialStats'));
    }
}