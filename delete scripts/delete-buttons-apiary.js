// this script will delete apiary data in the database

"use strict";
    $(document).ready(function(){
        console.log("Await complete");
        
        const deleteAlert = document.querySelectorAll('.record_delete');

        // delete records when click on any Red X button
        for (let i = 0; i < deleteAlert.length; i++) {
            deleteAlert[i].addEventListener('click', function () {
                const confirmBool = confirm('All Child records will also be deleted. Are you sure?');
                console.log(confirmBool);

                if (confirmBool === true) {
                    console.log(deleteAlert[i].id);

                    event.preventDefault();
                    $.post("delete scripts/delete-apiary.php", 
                    { 
                        apiaryID: deleteAlert[i].id
                    }, function()
                    {
                        //refresh page after deletion of record
                        location.reload();
                    });
                }
            });
        }
    });