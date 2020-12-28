@extends('layouts.app')
<link href = "https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,700&display=swap" rel = "stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="css/style.css">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-success alert-dismissable" role="alert">
                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                          {{ session('info') }}
                        </div>
                    @endif
                    <div class="container">                      
                      <header class="header">
                        <h1 id="title">
                          Welcome to Our Barber Shop 
                        </h1>
                        <p id="description">
                          Slot Booking
                        </p>   
                      </header>                    
                      <form id="survey-form" method="POST" action="/book-slot">        @csrf                
                        <div class="form-input-group">
                          <label for="name" id="name-label" class="form-label">
                            Name
                          </label>
                          <input type="text" name="name" id="name" class="form-input" placeholder="Enter your name" required>
                        </div>                        
                        <div class="form-input-group">
                          <label for="email" id="email-label" class="form-label">
                            Email
                          </label>
                          <input type="email" name="email" id="email" class="form-input" placeholder="Enter your email" required>
                        </div>                        
                        <div class="form-input-group">
                          <label for="number" id="number-label" class="form-label">
                            Select Slot Date
                          </label>
                          <input type="text" name="slot_date" class="form-input" id="datepicker" required>
                        </div>                        
                        <div class="form-input-group">                          
                          <p class="form-input-desp">
                            Select Time Slot
                          </p>                          
                            <select id="dropdown" name="slot_time" class="form-input input-dropdown" required>                          
                                <option selected value="">Select Time Slot</option>
                                <option value="11:00 AM" class="form-label input-label">11 AM - 12 PM</option>
                                <option value="12:00 PM" class="form-label input-label">12 PM - 1 PM</option>
                                <option value="1:00 PM" class="form-label input-label">1 PM - 2 PM</option>
                                <option value="2:00 PM" class="form-label input-label">2 PM - 3 PM</option>
                                <option value="3:00 PM" class="form-label input-label">3 PM - 4 PM</option>
                                <option value="4:00 PM" class="form-label input-label">4 PM - 5 PM</option>
                                <option value="5:00 PM" class="form-label input-label">5 PM - 6 PM</option>
                                <option value="6:00 PM" class="form-label input-label">6 PM - 7 PM</option>
                                <option value="7:00 PM" class="form-label input-label">7 PM - 8 PM</option>                            
                            </select>                          
                        </div>                                               
                        <div class="form-input-group">
                          <button type="submit" id="submit" class="submit-button">
                            Submit
                          </button>
                        </div>                        
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="js/home.js"></script>