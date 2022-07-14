var host = $("meta[name='host']").attr("content");  
$(document).ready(function(){
    'use strict'

        //Notification
            $(document).on('click', '.deleteNotification', function(){
                var val = $(this).data('id');
                Swal.fire({
                  title: 'Are you sure?',
                  text: "Want to delete this notification!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = host+'/notification/delete/'+val;
                    }else{
                        Swal.close();
                    }
                });
            });

            $(document).on('click', '.editNotification', function(){
                var val = $(this).data('id');
                $('#edit-notification').modal('show');
                $('#edit-notification .row').html('<img src="'+host+'/../public/loader.gif" />');
                $.get(host+'/notification/edit/'+val, function(data){
                    $('#edit-notification .row').html(data);
                    $('.textarea_editor2').wysihtml5();
                });
            });


        //Holidays
            $(document).on('click', '.deleteHoliday', function(){
                var val = $(this).data('id');
                Swal.fire({
                  title: 'Are you sure?',
                  text: "Want to delete this Holiday!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = host+'/holidays/delete/'+val;
                    }else{
                        Swal.close();
                    }
                });
            });

            $(document).on('click', '.editHoliday', function(){
                var val = $(this).data('id');
                $('#edit-holidays').modal('show');
                $('#edit-holidays .row').html('<img src="'+host+'/../public/loader.gif" />');
                $.get(host+'/holidays/edit/'+val, function(data){
                    $('#edit-holidays .row').html(data);
                });
            });

        //Department
            $(document).on('click', '.deleteDepartment', function(){
                var val = $(this).data('id');
                Swal.fire({
                  title: 'Are you sure?',
                  text: "Want to delete this department!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = host+'/settings/departments/delete/'+val;
                    }else{
                        Swal.close();
                    }
                });
            });

            $(document).on('click', '.editDepartment', function(){
                var val = $(this).data('id');
                $('#edit-department').modal('show');
                $('#edit-department .row').html('<img src="'+host+'/../public/loader.gif" />');
                $.get(host+'/settings/departments/edit/'+val, function(data){
                    $('#edit-department .row').html(data);
                });
            });

        //Employee
            $(document).on('click', '.editEmployee', function(){
                var val = $(this).data('id');
                Swal.fire({
                  title: 'Are you sure?',
                  text: "Want to edit this employee!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, edit it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = host+'/employee/edit/'+val;
                    }else{
                        Swal.close();
                    }
                });
            });


        $(document).on("click", ".browseProfilePhoto", function () {
           
            var file = $(this).parents().find(".profilePicRes");
            file.trigger("click");
        });
        $('.profilePicRes').change(function (e) {
          
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoRes').attr('src', e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
        
       

        $(document).on("click", ".browseProfilePhotoCat", function () {
            var file = $(this).parents().find(".profilePicCat");
            file.trigger("click");
        });
        $('.profilePicCat').change(function (e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoCat').attr('src', e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        $(document).on("click", ".browseProfilePhotoCatE", function () {
            var file = $(this).parents().find(".profilePicCatE");
            file.trigger("click");
        });
        $(document).on('change', '.profilePicCatE', function (e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoCatE').attr('src', e.target.result);
                console.log(e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });



    // driver
           $(document).on("click", ".browseProfilePhotoDImage", function () {
            var file = $(this).parents().find(".profilePicDImage");
            file.trigger("click");
        });
        $(document).on('change', '.profilePicDImage', function (e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoDImage').attr('src', e.target.result);
                console.log(e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });


           $(document).on("click", ".browseProfilePhotoDCF", function () {
            var file = $(this).parents().find(".profilePicDCF");
            file.trigger("click");
        });
        $(document).on('change', '.profilePicDCF', function (e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoDCF').attr('src', e.target.result);
                console.log(e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

            $(document).on("click", ".browseProfilePhotoDCB", function () {
            var file = $(this).parents().find(".profilePicDCB");
            file.trigger("click");
        });
        $(document).on('change', '.profilePicDCB', function (e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoDCB').attr('src', e.target.result);
                console.log(e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

           $(document).on("click", ".browseProfilePhotoDLF", function () {
            var file = $(this).parents().find(".profilePicDLF");
            file.trigger("click");
        });
        $(document).on('change', '.profilePicDLF', function (e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoDLF').attr('src', e.target.result);
                console.log(e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        $(document).on("click", ".browseProfilePhotoDLB", function () {
            var file = $(this).parents().find(".profilePicDLB");
            file.trigger("click");
        });
        $(document).on('change', '.profilePicDLB', function (e) {
            var fileName = e.target.files[0].name;

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                $('.previewProfilePhotoDLB').attr('src', e.target.result);
                console.log(e.target.result);
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        // driverstatus


           $(document).on('click', '.driverEdit', function(){
            var val = $(this).data('id');
            Swal.fire({
              title: 'Are you sure?',
              text: "Want to edit this Driver!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, edit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = host+'/drivers/edit/'+val;
                }else{
                    Swal.close();
                }
            });
            
        });

           $(document).on('click', '.driverActive', function(){
             var user_id = $(this).data('id');
            var status = 1;
            Swal.fire({
              title: 'Are you sure?',
              text: "Want to Block this Driver!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Block it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = host+'/drivers/statusActive/'+user_id+'/'+status;
                }else{
                    Swal.close();
                }
            });
            
        });

          $(document).on('click', '.driverBlock', function(){
             var user_id = $(this).data('id');
            var status = 2;
            Swal.fire({
              title: 'Are you sure?',
              text: "Want to Block this Driver!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Block it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = host+'/drivers/statusBlock/'+user_id+'/'+status;
                }else{
                    Swal.close();
                }
            });
            
        });

         $(document).on('click', '.driverDeleted', function(){
             var user_id = $(this).data('id');
            var status = 3;
            Swal.fire({
              title: 'Are you sure?',
              text: "Want to Delete this Driver!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = host+'/drivers/driverDeleted/'+user_id+'/'+status;
                }else{
                    Swal.close();
                }
            });
            
        });


           $(document).on('click', '.driverRestore', function(){
            var val = $(this).data('id');
            Swal.fire({
              title: 'Are you sure?',
              text: "Want to restore this Driver!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, restore it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = host+'/drivers/restore/'+val;
                }else{
                    Swal.close();
                }
            });
        });


        //Driver Details

        $(document).on('click', '.viewDriverDetail', function(){
            var id = $(this).data('id');
            $('#driverDetailModal').modal('show');
            $('#driverModalContent').html('<div class="loaderBlock"><img src="'+host+'/../public/loader.gif"/></div>');
            $.get(host+'/drivers/details/'+id, function(data){
                $('#driverModalContent').html(data);
            });
        });
});