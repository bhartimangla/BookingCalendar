<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SlotBooking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('test');
        $bookingSlots = SlotBooking::all();

        foreach ($bookingSlots as $key => $bookingSlot) {
            $data = strtotime($bookingSlot->slot_date);
            $bookingSlot->slot_date= date('F d, Y', $data);           
        }

        return view('home')->with('bookingSlots', $bookingSlots);
    }

    public function slotTimes(Request $request)
    {
        $slotTimes = [];
        $bookingSlots = SlotBooking::select('slot_time')->Where('slot_date', $request->slotDate)->get();
        foreach ($bookingSlots as $key => $bookingSlot) {
            array_push($slotTimes, $bookingSlot->slot_time);
        }
        $response['data'] = $slotTimes;
        echo json_encode($response);
    }

    public function allBookedSlots()
    {
        $allBookedDays = [];
        $allBookedMonths = [];
        $allBookedSlots = [];
        $bookingDays = SlotBooking::select('slot_date')->get();

        foreach ($bookingDays as $key => $bookingDay) {
            array_push($allBookedDays, explode('/', $bookingDay->slot_date)[0]);
            array_push($allBookedMonths, explode('/', $bookingDay->slot_date)[1]);
            $slotTimes = [];
            $slotDayTimes = [];
            $bookDate = strtotime($bookingDay->slot_date);
            $slotDayTimes[0] = date('F d, Y', $bookDate);
            $bookingSlots = SlotBooking::select('slot_time')->Where('slot_date', $bookingDay->slot_date)->get();

            foreach ($bookingSlots as $key => $bookingSlot) {
                array_push($slotTimes, $bookingSlot->slot_time);
            }

            $slotDayTimes[1] = $slotTimes;
            $allBookedSlots[0] = $slotDayTimes;
        }

        $allBookedSlots[1] = $allBookedDays;
        $allBookedSlots[2] = $allBookedMonths;
        $response['allBookedSlots'] = $allBookedSlots;
        echo json_encode($response);
    }

    public function slotBook(Request $request) {

        $validatedData = $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255',
          'slot_date' => 'required|string|max:255',
          'slot_time' => 'required|string|max:255',
        ]);

        $bookingSlot =  new SlotBooking();
        $bookingSlot->name = $request->name;
        $bookingSlot->email = $request->email;
        $bookingSlot->slot_date = $request->slot_date;
        $bookingSlot->slot_time = $request->slot_time;
        $bookingSlot->save();

        return redirect()->back()->with("info","Slot booked successfully !");
        // return redirect('/home')->with('info','Directory successfully deleted!');
    }
}
