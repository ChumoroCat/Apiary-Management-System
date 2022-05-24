// this script will open the edit window

"use strict";
    $(document).ready(function(){
        const modalEdit = document.querySelector('.open-window-edit');
        const btnsOpenWindowEdit = document.querySelectorAll('.record_edit');
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
            document.querySelector('#hive-type-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .hives-record-detail-type').innerHTML;
            document.querySelector('#hive-noofframes-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .hives-record-detail-noofframes').innerHTML;
            document.querySelector('#hive-date-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .hives-record-detail-date').innerHTML;
            //--------------------------------------------------------------------------->

            //This button will send the data to update the record
            $(".form-container-edit").submit(function(){
                event.preventDefault();
                console.log("Update Button Clicked");

                var apiaryIDV = document.querySelector('#apiary-name-edit').value;
                var typeV = document.querySelector('#hive-type-edit').value;
                var nooframesV = document.querySelector('#hive-noofframes-edit').value;
                var dateV = document.querySelector('#hive-date-edit').value;

                $.post("update scripts/update-hive.php", 
                { 
                    hiveID: btnsOpenWindowEdit[i].id,
                    apiaryID: apiaryIDV, 
                    typeOfHive: typeV, 
                    noOfFrame: nooframesV,
                    dateCreated: dateV
                }, function()
                {
                    $(".submit-text").text("Hive Updated !");
                    location.reload();
                });
            });

            });
        }


    });