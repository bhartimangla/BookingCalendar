
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<body>
 
<p>Date: <input type="text" id="datepicker"></p>

</body>
<script type="text/javascript">
	$(function(){
	    $( "#datepicker" ).datepicker({
	          maxDateDate: new Date(2016, 10 - 1, 25), 
	          minDate: "now",
	          dateFormat : 'mm/dd/yy',
	    });
	});
</script>