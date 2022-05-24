// this script will open the edit window

"use strict";
    $(document).ready(function(){
        const modalSell = document.querySelector('.open-window-sell');
        const btnsOpenWindowSell = document.querySelectorAll('.record_sell');
        const overlay = document.querySelector('.overlay'); 

        const openModalSell = function () {
            modalSell.classList.remove('hidden');
            overlay.classList.remove('hidden');
        };

        const closeModal = function () {
            modalSell.classList.add('hidden');
            overlay.classList.add('hidden');
        };

        // press esc or click on overlay to close windows
        overlay.addEventListener('click', closeModal);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && (!modalSell.classList.contains('hidden'))) {
            closeModal();
            }
        });
        
        // when clicking on the sell button
        for (let i = 0; i < btnsOpenWindowSell.length; i++){
            btnsOpenWindowSell[i].addEventListener('click', function () {
            
            //opens edit window
            openModalSell();
            
            console.log("this is edit id = a" + btnsOpenWindowSell[i].id);
            
            //--------------------------------------------------------------------------->

            //This button will send the data to update the record
            $(".form-container-sell").submit(function(){
                event.preventDefault();
                console.log("Sell Button Clicked");

                var revenueV = document.querySelector('#amount-sell').value
                var dateV = document.querySelector('#revenue-date-sell').value

                $.post("insert scripts/insert-accountbook.php", 
                { 
                    productID: btnsOpenWindowSell[i].id,
                    revenue: revenueV,
                    dateOfEntry: dateV
                }, function()
                {
                    $(".submit-text").text("Harvest Sold !");
                    location.reload();
                });
            });

            });
        }


    });