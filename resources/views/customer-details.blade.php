<!DOCTYPE html>
<html>
<head>
	<title>Customer Details</title>
	<style type="text/css">
	body::before {
		content: '';
		position: fixed;
		height: 100%;
		width: 100%;
		background-image: linear-gradient(115deg, rgba(255, 244, 227, 0.75), rgba(255, 192, 95, 0.55)), url(https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=753&q=80);
		background-size: cover;
		background-position: center;
	}

	.content {
		text-align: center;
		position: absolute;
		top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    font-size: 30px;
	}
	.back {
	  font: bold 30px Arial;
	  text-decoration: none;
	  background-color: #afbde4;
	  color: #333333;
	  padding: 2px 6px 2px 6px;
	  border-top: 1px solid #CCCCCC;
	  border-right: 1px solid #333333;
	  border-bottom: 1px solid #333333;
	  border-left: 1px solid #CCCCCC;
	  border-radius: 12px;
	}
	</style>
</head>
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-body">
	                    <div class="content">                      
	                        <h3>
	                          Customer Name: {{$customerData->name}}
	                        </h3>
	                        <p>
	                        	Email: {{$customerData->email}}
	                        </br>
	                          Slot Booked on date {{$customerData->slot_date}} at {{$customerData->slot_time}} (For one hour only)
	                        </p>   
	                		<a href="/" class="back">OK</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
</html>
