<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // عرض جميع الحجوزات
    public function index()
    {
        $appointments = Appointment::all();
        return view('dashboard.Appointment.index', compact('appointments'));
    }

    // عرض نموذج إضافة حجز جديد
    public function create()
    {
        return view('dashboard.Appointment.create');
    }

    // حفظ الحجز الجديد
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    // عرض تفاصيل الحجز
    public function show(Appointment $appointment)
    {
        return view('dashboard.Appointment.show', compact('appointment'));
    }

    // عرض نموذج تعديل الحجز
    public function edit(Appointment $appointment)
    {
        return view('dashboard.Appointment.edit', compact('appointment'));
    }

    // تحديث الحجز
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $appointment->update($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    // حذف الحجز (Soft Delete)
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    // عرض الحجوزات المحذوفة
    public function trashed()
    {
        $appointments = Appointment::onlyTrashed()->get();
        return view('dashboard.Appointment.trashed', compact('appointments'));
    }

    // استعادة الحجز المحذوف
    public function restore($id)
    {
        $appointment = Appointment::onlyTrashed()->findOrFail($id);
        $appointment->restore();
        return redirect()->route('appointments.trashed')->with('success', 'Appointment restored successfully.');
    }

    // حذف الحجز نهائيًا
    public function forceDelete($id)
    {
        $appointment = Appointment::onlyTrashed()->findOrFail($id);
        $appointment->forceDelete();
        return redirect()->route('appointments.trashed')->with('success', 'Appointment permanently deleted.');
    }
}