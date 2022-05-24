// this script will open the edit window

"use strict";
    $(document).ready(function(){
                        
        //Display values on form. Below variables to be changed according to the page.
        document.querySelector('#profile-detail-list-item-firstname-edit').value = document.querySelector('.profile-detail-list-item-firstname').innerHTML;
        document.querySelector('#profile-detail-list-item-lastname-edit').value = document.querySelector('.profile-detail-list-item-lastname').innerHTML;
        document.querySelector('#profile-detail-list-item-address-edit').value = document.querySelector('.profile-detail-list-item-address').innerHTML;
        document.querySelector('#profile-detail-list-item-emailaddress-edit').value = document.querySelector('.profile-detail-list-item-emailaddress').innerHTML;
        document.querySelector('#profile-detail-list-item-contactno-edit').value = document.querySelector('.profile-detail-list-item-contactno').innerHTML;
        document.querySelector('#profile-detail-list-item-companyname-edit').value = document.querySelector('.profile-detail-list-item-companyname').innerHTML;
        document.querySelector('#profile-detail-list-item-regno-edit').value = document.querySelector('.profile-detail-list-item-regno').innerHTML;
        document.querySelector('#profile-detail-list-item-regterritory-edit').value = document.querySelector('.profile-detail-list-item-regterritory').innerHTML;
        //--------------------------------------------------------------------------->

    });