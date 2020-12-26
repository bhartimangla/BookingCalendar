@extends('layouts.app')
<link href = "https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,700&display=swap" rel = "stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    var $j = jQuery.noConflict();

    $j(function(){
        $j( "#datepicker" ).datepicker({
            maxDateDate: new Date(2016, 10 - 1, 25), 
            minDate: "now",
            dateFormat: 'dd/mm/yy',
            onSelect: function(dateText) {
                console.log("Selected date: " + dateText + "; input's current value: " + this.value);
                $j.ajax({
                    url: "/slot-time",
                    data: {
                        slotDate: this.value
                    },
                    type: "POST",
                    async: false,
                    success: function (response) {
                        var data = JSON.parse(response);

                        jQuery.each(data.data, function(index, item) {
                            $j("#dropdown option[value='" + item + "']").hide();
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            } 
        });

        $j("#datepicker").keyup( function() {
            $j("#datepicker").val('');
        });
    });    
</script>
<style type="text/css">
:root {
  --color-seablue: #3196E2;
  --color-sand-hsla: hsla(38deg, 100%, 78%, .87);  
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

body::before {
  content: '';
  position: fixed;
  height: 100%;
  width: 100%;
  background-image: linear-gradient(115deg, rgba(255, 244, 227, 0.75), rgba(255, 192, 95, 0.55)), url(https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=753&q=80);
  background-size: cover;
  background-position: center;
}

.header * {
  text-align: center;
  color: var(--color-seablue);
  padding: 12px;
}

#title {
  font-weight: 700;
}

#description {
  font-size: 1.125rem;
  padding: 0 22px;
}

.container {
  margin: 20px auto;
}

#survey-form {  
  padding: 20px 40px;
  background-color:  var(--color-sand-hsla);
  border-radius: 22px;
}

.form-input-group {  
  margin-bottom: 15px;
}

.form-label, .form-input-desp {
  font-size: 1.5rem;  
  margin-bottom: 0;
}

#name, #email, #number, #dropdown, #comment, #submit, #datepicker {  
  width: 100%;
  height: 3.2rem;  
  font-size: 1.125rem;
  font-weight: 400;
  text-indent: 0.5rem;
  color: var(--color-seablue);
  border-radius: 16px;
}

#submit {
  background-color: var(--color-seablue);
  color: var(--color-white);
  font-weight: 700;
  margin-top: 20px;
}

@media (max-width: 640px) {  
    .form-label, .form-input-desp {
        font-size: 1.25rem;
    } 

    #name, #email, #number, #dropdown, #comment, #submit, #datepicker {
        font-size: 1rem;
    }

    #survey-form {
        padding: 10px 16px;
    }

    .container {
        margin: 10px auto;
        max-width: 80%;
    }
}
</style>
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
<script type="text/javascript">
    /* for session expire */
    setTimeout(function() {
        $('.alert-dismissable').fadeOut();
    }, 3000);
</script>