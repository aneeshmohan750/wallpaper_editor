$(document).ready(function() { 
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true,
		format: "yyyy-mm-dd",
    });
	$('#work_start_date').datepicker({format: "yyyy-mm-dd",startDate: today})
    .on("input change", function (e) {
    $('#work_end_date').datepicker("remove");
	$('#work_end_date').datepicker({
		format: "yyyy-mm-dd",		
		startDate: new Date(e.target.value)
	});
});
	//var start_date=$('#work_start_date').val();
	
	var dt = new Date();
    $('.datetime-picker').datetimepicker();
	
	
	$('#work_area').DataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
   
});