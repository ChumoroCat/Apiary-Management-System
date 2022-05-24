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
            document.querySelector('#colony-description-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .colony-record-detail-description').innerHTML;
            document.querySelector('#colony-composition-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .colony-record-detail-composition').innerHTML;
            //--------------------------------------------------------------------------->

            //This button will send the data to update the record
            $(".form-container-edit").submit(function(){
                event.preventDefault();
                console.log("Update Button Clicked");

                var hiveIDV = document.querySelector('#hive-name-edit').value;
                var descriptionV = document.querySelector('#colony-description-edit').value
                var compositionV = document.querySelector('#colony-composition-edit').value

                $.post("update scripts/update-colony.php", 
                { 
                    colonyID: btnsOpenWindowEdit[i].id,
                    hiveID: hiveIDV, 
                    description: descriptionV,
                    compositionOfColony: compositionV
                },function()
                {
                    $(".submit-text").text("Colony Updated !");
                    location.reload();
                });
            });

            });
        }


    });