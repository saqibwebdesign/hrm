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
});