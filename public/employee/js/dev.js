var host = $("meta[name='host']").attr("content"); 

$(document).ready(function(){
	'use strict'

	$(document).on('click', '.clockIn', function(){
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You want to clock in!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Clock in!'
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location.href = host+'/attendance/clockAttempt/1';
		  }
		});
	});

	$(document).on('click', '.clockOut', function(){
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You want to clock out!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Clock out!'
		}).then((result) => {
		  if (result.isConfirmed) {
		    window.location.href = host+'/attendance/clockAttempt/2';
		  }
		});
	});



	//Leaves
	$(document).on('change', '#to_date', function(){
		var from_date = $('#from_date').val();
		var to_date = $(this).val();
		var diff = datediff(parseDate(from_date), parseDate(to_date));
		$('#days').val(diff);
	});
});



function parseDate(str) {
    //var mdy = str.split('/');
    return new Date(str);
}

function datediff(first, second) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return (Math.round((second-first)/(1000*60*60*24)))+1;
}