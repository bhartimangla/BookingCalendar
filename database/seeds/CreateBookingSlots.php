<?php

use Illuminate\Database\Seeder;
use App\SlotBooking;
use Carbon\Carbon;

class CreateBookingSlots extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookingSlots = [
	        ['id' => 1, 'name' => 'A', 'email' => 'a@gmail.com', 'slot_date' => '26/12/2020', 'slot_time' => '5:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 2, 'name' => 'B', 'email' => 'b@gmail.com', 'slot_date' => '29/12/2020', 'slot_time' => '2:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 3, 'name' => 'C', 'email' => 'c@gmail.com', 'slot_date' => '26/12/2020', 'slot_time' => '12:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 4, 'name' => 'D', 'email' => 'd@gmail.com', 'slot_date' => '29/12/2020', 'slot_time' => '11:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 5, 'name' => 'E', 'email' => 'e@gmail.com', 'slot_date' => '29/12/2020', 'slot_time' => '7:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 6, 'name' => 'F', 'email' => 'f@gmail.com', 'slot_date' => '29/12/2020', 'slot_time' => '1:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 7, 'name' => 'G', 'email' => 'g@gmail.com', 'slot_date' => '29/12/2020', 'slot_time' => '4:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 8, 'name' => 'H', 'email' => 'h@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '11:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 9, 'name' => 'I', 'email' => 'i@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '3:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 10, 'name' => 'J', 'email' => 'j@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '4:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 11, 'name' => 'K', 'email' => 'k@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '2:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 12, 'name' => 'L', 'email' => 'l@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '7:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 13, 'name' => 'M', 'email' => 'm@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '5:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 14, 'name' => 'N', 'email' => 'n@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '1:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 15, 'name' => 'O', 'email' => 'o@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '12:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 16, 'name' => 'P', 'email' => 'p@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '6:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
	        ['id' => 17, 'name' => 'Q', 'email' => 'q@gmail.com', 'slot_date' => '31/12/2020', 'slot_time' => '8:00 PM', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]        
	    ];
	    	
	    SlotBooking::insert($bookingSlots);
    }
}
