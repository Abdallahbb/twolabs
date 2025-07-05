<?php

namespace App\Http\Controllers;

use App\Mail\appointment as MailAppointment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Appointments extends Controller
{
    //
    public function index()
    {
        return view('appointments')->with([
            'pending_total' => Appointment::where('status', 'pending')->count(),
            'all_appointment' => Appointment::count(),
            'pending' => Appointment::where('status', 'Pending')->get(),
            'approved' => Appointment::where('status', 'Approved')->get(),
        ]);
    }

    public function show()
    {
        return view('book');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'app_date' => 'required',
            'app_time' => 'required',
            'description' => 'required',
        ]);
        $validated['user_id'] = Auth::id();

        $appointment = Appointment::create($validated);
  
        if ($appointment) {
            try {
                Mail::to('amodutaiwobolaji@gmail.com')->send(new MailAppointment($appointment, 'Appointment Booking',"An appointment has been booked"));
            } catch (\Exception $e) {
                Log::error("message", $e->getMessage());
            } finally {
                return redirect()->route('user_dashboard')->with('success', 'Appointment was booked successfully');
            }
        }
        return redirect()->route('appointments')->with('error', 'Unable to book appointment');
    }

    public function approve(Request $request)
    {
        $id = $request->id;
        $appointment = Appointment::findOrFail($id);

        if ($appointment) {

            $appointment->update([
                'status' => 'Approved',
            ]);
           
            try {
                Mail::to('amodutaiwobolaji@gmail.com')->send(new MailAppointment($appointment, 'Appointment Booking', 'Appointment was approved successfully'));
            } catch (\Exception $e) {
                Log::error("message", $e->getMessage());
            } finally {
                return redirect()->route('dashboard')->with('success', 'Appointment was Approved successfully');
            }
        }

        return redirect()->route('appointments')->with('error', 'Unable to approve appointment');
    }
    public function decline(Request $request)
    {
        $id = $request->id;
        $appointment = Appointment::findOrFail($id);

        if ($appointment) {
            $appointment->update([
                'status' => 'Cancelled',
            ]);
            return redirect()->back()->with('success', 'Appointment was cancelled');
        }

        return redirect()->back()->with('error', 'Unable to cancel appointment');
    }
}
