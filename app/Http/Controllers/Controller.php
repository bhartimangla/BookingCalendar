<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\SlotBooking;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function allBookedSlots() {
        $allBookedDays = [];
        $allBookedMonths = [];
        $allBookedSlots = [];
        $allBookedSlots[0] = [];
        $bookingDays = SlotBooking::select('slot_date')->get();

        foreach ($bookingDays as $key => $bookingDay) {
            array_push($allBookedDays, explode('/', $bookingDay->slot_date)[0]);
            array_push($allBookedMonths, explode('/', $bookingDay->slot_date)[1]);
            $slotTimes = [];
            $slotDayTimes = [];
            $allSelectSlots = [];
            $bookDate = str_replace('/', '-', $bookingDay->slot_date);
            $bookDate = strtotime($bookDate);
            $slotDayTimes[0] = date("F d, Y", $bookDate);
            $bookingSlots = SlotBooking::select('slot_time')->Where('slot_date', $bookingDay->slot_date)->get();

            foreach ($bookingSlots as $key => $bookingSlot) {
                array_push($slotTimes, $bookingSlot->slot_time);
            }

            $slotDayTimes[1] = $slotTimes;
            array_push($allBookedSlots[0], $slotDayTimes);
        }

        $allBookedSlots[1] = array_unique($allBookedDays);
        $allBookedSlots[2] = array_unique($allBookedMonths);
        $response['allBookedSlots'] = $allBookedSlots;
        echo json_encode($response);
    }

    public function getCustomer(Request $request) {
        $date = date("d/m/Y", strtotime($request->date));
    	$customerData = SlotBooking::select('id')->where(['slot_date' => $date, 'slot_time' => $request->time])->first();
    	echo $customerData->id;
    }

    public function viewCustomerDetails($id) {
    	$customerData = SlotBooking::where('id', $id)->first();
    	return view('customer-details')->with('customerData', $customerData);
    }
}
