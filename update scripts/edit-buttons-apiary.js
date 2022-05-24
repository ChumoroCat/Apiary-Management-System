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
            document.querySelector('#apiary-name-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .apiary-record-detail-apiary').innerHTML;
            document.querySelector('#apiary-location-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .apiary-record-detail-location').innerHTML;
            document.querySelector('#apiary-coordinates-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .apiary-record-detail-coordinates').innerHTML;
            document.querySelector('#apiary-flora-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .apiary-record-detail-flora').innerHTML;
            document.querySelector('#apiary-noofhives-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .apiary-record-detail-noofhives').innerHTML;
            document.querySelector('#apiary-date-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .apiary-record-detail-date').innerHTML;
            //--------------------------------------------------------------------------->

            //This button will send the data to update the record
            $(".form-container-edit").submit(function(){
                event.preventDefault();
                console.log("Update Button Clicked");

                var nameV = document.querySelector('#apiary-name-edit').value
                var locationV = document.querySelector('#apiary-location-edit').value
                var coordinatesV = document.querySelector('#apiary-coordinates-edit').value
                var floraV = document.querySelector('#apiary-flora-edit').value
                var noofhiveV = document.querySelector('#apiary-noofhives-edit').value
                var dateV = document.querySelector('#apiary-date-edit').value

                $.post("update scripts/update-apiary.php", 
                { 
                    apiaryID: btnsOpenWindowEdit[i].id,
                    apiaryName: nameV, 
                    apiaryLocation: locationV,
                    mapCoordinates: coordinatesV,
                    typeOfFlora: floraV,
                    noOfHive: noofhiveV,
                    dateCreated: dateV
                }, function()
                {
                    $(".submit-text").text("Apiary Updated !");
                    location.reload();
                });
            });

            });
        }


    });