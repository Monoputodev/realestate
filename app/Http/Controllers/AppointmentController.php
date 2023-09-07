<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Availability;
use App\Models\Location;
use App\Models\Prescription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prescription = Prescription::find($id);
        $appointment = Appointment::where('appointment_id',$prescription->appointment_id)->first();
//  dd($appointment);
        $user = $appointment->user;

        // dd($prescription);
        return view('admin.pages.appointment.edit', compact('user','appointment','prescription'));
    }
     public function index()
    {
        $appointments = Appointment::all();

        return view('admin.pages.appointment.index', compact('appointments'));
    }
    public function print($id)
    {
        $appointment = Appointment::find($id);
        $user = $appointment->user;
        $prescription = Prescription::where('appointment_id',$appointment->appointment_id)->first();
        return view('admin.pages.appointment.print', compact('user','appointment','prescription'));
    }
    public function prescribe($id)
    {
        $appointment = Appointment::find($id);
        $user = $appointment->user;
        // dd($user);
        return view('admin.pages.appointment.prescribe', compact('user','appointment'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();

        $avaibilities = Availability::where('date', '>', $now->toDateString())
            ->orWhere(function ($query) use ($now) {
                $query->where('date', $now->toDateString())->where('time', '>', $now->toTimeString());
            })
            ->get();
        $locations = Location::where('status', '1')->get();

        // dd($avaibilities );
        return view('web.pages.appointment', compact('locations', 'avaibilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the form data
        $validatedData = $request->validate([
            'location' => 'required',
            'available_dates' => 'required',
        ]);
        // Create a new appointment instance
        $appointment = new Appointment();
        $appointment->location = $validatedData['location'];
        $appointment->timeline = $validatedData['available_dates'];
        $appointment->user_id = Auth::user()->id;
        $appointment->appointment_id = '#ws'.substr(md5(uniqid(mt_rand(), true)), 0, 8);;

        // Save the appointment to the database
        $appointment->save();

        // Redirect or perform any other actions as needed
        return redirect()
            ->back()
            ->with('success', 'Appointment booked successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function Active(Appointment $appointment)
    {
        $appointment->status = '1';
        if ($appointment->save()) {
            return redirect()
                ->route('appointments.index')
                ->with('success', 'appointment Activated successfully.');
        } else {
            return back()->with('error', 'appointment Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Appointment $appointment)
    {
        // dd($appointment->status);
        $appointment->status = '0';
        if ($appointment->save()) {
            return redirect()
                ->route('appointments.index')
                ->with('success', 'appointment Deactivated successfully.');
        } else {
            return back()->with('error', 'appointment Dactivation Unsuccessfull.');
        }
    }
}
