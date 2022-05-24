// this script will open the edit window

"use strict";
    $(document).ready(function(){
        const modalEdit = document.querySelector('.open-window-edit-2');
        const btnsOpenWindowEdit = document.querySelectorAll('.record_edit-schedule');
        const overlay = document.querySelector('.overlay'); 

        const openModalEdit = function () {
            modalEdit.classList.remove('hidden');
            overlay.classList.remove('hidden');
        };

        const closeModal = function () {
            modalEdit.classList.add('hidden');
            overlay.classList.add('hidden');
        };

        // press esc or click on overlay to close windows
        overlay.addEventListener('click', closeModal);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && (!modalEdit.classList.contains('hidden'))) {
            closeModal();
            }
        });
        
        // when clicking on the edit button
        for (let i = 0; i < btnsOpenWindowEdit.length; i++){
            btnsOpenWindowEdit[i].addEventListener('click', function () {
            
            //opens edit window
            openModalEdit();
            
            console.log("this is edit id = a" + btnsOpenWindowEdit[i].id);
            
            //Display values on form. Below variables to be changed according to the page.
            document.querySelector('#inspection-schedule-date-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .inspection-schedule-detail-date').innerHTML;
            document.querySelector('#inspection-schedule-status-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .inspection-schedule-detail-status').innerHTML;
            //--------------------------------------------------------------------------->

            //This button will send the data to update the record
            $(".form-container-edit-2").submit(function(){
                event.preventDefault();
                console.log("Update Button Clicked");

                var hiveIDV = document.querySelector('#hive-name-edit').value;
                var dateV = document.querySelector('#inspection-schedule-date-edit').value;
                var statusV = document.querySelector('#inspection-schedule-status-edit').value;

                $.post("update scripts/update-inspection-schedule.php", 
                { 
                    inspectionID: btnsOpenWindowEdit[i].id,
                    hiveID: hiveIDV,
                    actualInspectionDate: dateV, 
                    completionStatus: statusV
                }, function()
                {
                    $(".submit-text").text("Schedule Updated !");
                    location.reload();
                });
            });

            });
        }


    });