// this script will open the edit window

"use strict";
    $(document).ready(function(){
        const modalInspect = document.querySelector('.open-window-inspect');
        const btnsOpenWindowInspect = document.querySelectorAll('.record_inspect');
        const overlay = document.querySelector('.overlay'); 

        const openModalInspect = function () {
            modalInspect.classList.remove('hidden');
            overlay.classList.remove('hidden');
        };

        const closeModal = function () {
            modalInspect.classList.add('hidden');
            overlay.classList.add('hidden');
        };

        // press esc or click on overlay to close windows
        overlay.addEventListener('click', closeModal);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && (!modalInspect.classList.contains('hidden'))) {
            closeModal();
            }
        });
        
        // when clicking on the sell button
        for (let i = 0; i < btnsOpenWindowInspect.length; i++){
            btnsOpenWindowInspect[i].addEventListener('click', function () {
            
            //opens edit window
            openModalInspect();
            
            console.log("this is edit id = a" + btnsOpenWindowInspect[i].id);
            
            //--------------------------------------------------------------------------->

            //This button will send the data to update the record
            $(".form-container-inspect").submit(function(){
                event.preventDefault();
                console.log("Inspect Button Clicked");

                var observationV = document.querySelector('#inspection-record-observation-inspect').value
                var statusV = document.querySelector('#inspection-record-status-inspect').value

                $.post("insert scripts/insert-inspection-record.php", 
                { 
                    inspectionID: btnsOpenWindowInspect[i].id,
                    observation: observationV,
                    completionStatus: statusV
                }, function()
                {
                    $(".submit-text").text("Inspection Done !");
                    location.reload();
                });
            });

            });
        }


    });