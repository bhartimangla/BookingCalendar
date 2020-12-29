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
        $allBookedSlots = [];
        $allBookedSlots[0] = [];
        $allBookedSlots[1] = [];
        $allmonthlySlots = [];
        $bookingDays = SlotBooking::select('slot_date')->distinct()->get();
        
        foreach ($bookingDays as $key => $bookingDay) {
            $slotTimes = [];
            $slotDays = [];
            $slotDayTimes = [];
            $slotMonth = [];
            $allSelectSlots = [];
            $bookDate = str_replace('/', '-', $bookingDay->slot_date);
            $bookDate = strtotime($bookDate);
            $slotDayTimes[0] = date("F d, Y", $bookDate);
            $slotMonth[0] = date("F Y", $bookDate);
            array_push($slotDays, explode('/', $bookingDay->slot_date)[0]);
            $bookingSlots = SlotBooking::select('slot_time')->Where('slot_date', $bookingDay->slot_date)->get();

            foreach ($bookingSlots as $key => $bookingSlot) {
                array_push($slotTimes, $bookingSlot->slot_time);
            }

            $slotDayTimes[1] = $slotTimes;
            $slotMonth[1] = $slotDays;
            array_push($allBookedSlots[0], $slotDayTimes);
            array_push($allmonthlySlots, $slotMonth);
        }

        $allUniqueMonths = [];
        foreach ($allmonthlySlots as $key => $monthlySlot) {
            if (!in_array($monthlySlot[0], $allUniqueMonths)) {
                array_push($allUniqueMonths, $monthlySlot[0]);
            }
        }

        foreach ($allUniqueMonths as $key => $month) {
            $mergeDays = [];
            foreach ($allmonthlySlots as $key => $monthlySlot) {
                if ($monthlySlot[0] == $month) {
                    array_push($mergeDays, $monthlySlot[1][0]);
                }
            }
            $bookedDates = [];
            $bookedDates[0] = $month;
            $bookedDates[1] = array_unique($mergeDays);
            array_push($allBookedSlots[1], $bookedDates);
        }

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

    public function getBookingSlots(Request $request) {
        $day = $request->day;
        $date = date_parse($request->month);
        $month = $date['month'];
        $year = $request->year;
        $customerData = SlotBooking::select('slot_time')->where('slot_date', $day.'/'.$month.'/'.$year)->get();
        echo $customerData->count();
    }
}
