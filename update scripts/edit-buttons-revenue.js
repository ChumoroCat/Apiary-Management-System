// this script will open the edit window

"use strict";
    $(document).ready(function(){
        const modalEdit = document.querySelector('.open-window-edit-2');
        const btnsOpenWindowEdit = document.querySelectorAll('.record_edit-revenue');
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
            document.querySelector('#revenue-record-amount-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .bookkeeping-revenue-detail-amount').innerHTML;
            document.querySelector('#revenue-record-date-edit').value = document.querySelector('#a' + + btnsOpenWindowEdit[i].id + ' > .bookkeeping-revenue-detail-date').innerHTML;
            //--------------------------------------------------------------------------->

            //This button will send the data to update the record
            $(".form-container-edit-2").submit(function(){
                event.preventDefault();
                console.log("Update Button Clicked");

                var amountV = document.querySelector('#revenue-record-amount-edit').value
                var dateV = document.querySelector('#revenue-record-date-edit').value

                $.post("update scripts/update-revenue.php", 
                { 
                    accountBookID: btnsOpenWindowEdit[i].id,
                    revenue: amountV,
                    dateOfEntry: dateV
                }, function()
                {
                    $(".submit-text").text("Revenue Updated !");
                    location.reload();
                });
            });

            });
        }


    });