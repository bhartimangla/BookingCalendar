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

setTimeout(function() {
    $('.alert-dismissable').fadeOut();
}, 3000);
