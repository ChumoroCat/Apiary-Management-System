// this script will delete colony data in the database

"use strict";
    $(document).ready(function(){
        console.log("Await complete");
        
        const deleteAlertSchedule = document.querySelectorAll('.record_delete-schedule');

        // delete records when click on any Red X button
        for (let i = 0; i < deleteAlertSchedule.length; i++) {
            deleteAlertSchedule[i].addEventListener('click', function () {
                const confirmBool = confirm('All Child records will also be deleted. Are you sure?');
                console.log(confirmBool);
                
                if (confirmBool === true) {
                    console.log(deleteAlertSchedule[i].id);

                    event.preventDefault();
                    $.post("delete scripts/delete-inspection-schedule.php", 
                    { 
                        inspectionID: deleteAlertSchedule[i].id
                    }, function()
                    {
                        //refresh page after deletion of record
                        location.reload();
                    });
                }
            });
        }
    });