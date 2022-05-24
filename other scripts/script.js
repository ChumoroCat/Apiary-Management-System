'use strict';

$(document).ready(function(){
  
  //"open window" container
  const modal = document.querySelector('.open-window');
  const modal2 = document.querySelector('.open-window-2');
  const modalEdit = document.querySelector('.open-window-edit');
  const modalEdit2 = document.querySelector('.open-window-edit-2');
  const modalEditInspect = document.querySelector('.open-window-inspect');
  const modalEditSell = document.querySelector('.open-window-sell');


  const overlay = document.querySelector('.overlay'); 
  const btnsCloseWindow = document.querySelectorAll('.close-window');

  //buttons to open window
  const btnOpenWindow = document.querySelector('.button-harvest-create');
  const btnOpenWindow2 = document.querySelector('.open2');


  const openModal = function () {
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');
  };

  const openModal2 = function () { 
    modal2.classList.remove('hidden');
    overlay.classList.remove('hidden');
  };

  const closeModal = function () {
    modal.classList.add('hidden');
    overlay.classList.add('hidden');

    if(document.body.contains(modal2)){
    modal2.classList.add('hidden');
    }
    if(document.body.contains(modalEdit)){
      modalEdit.classList.add('hidden');
    }
    if(document.body.contains(modalEdit2)){
      modalEdit2.classList.add('hidden');
    }
    if(document.body.contains(modalEditInspect)){
      modalEditInspect.classList.add('hidden');
    }
    if(document.body.contains(modalEditSell)){
      modalEditSell.classList.add('hidden');
    }
  };

  btnOpenWindow.addEventListener('click', openModal);

  // close window2 if window2 exists
  if(document.body.contains(modal2)) {
    btnOpenWindow2.addEventListener('click', openModal2);
  }

  // close all windows with X button
  for (let i = 0; i < btnsCloseWindow.length; i++){
    btnsCloseWindow[i].addEventListener('click', closeModal);
  }

  // press esc or click on overlay to close windows
  overlay.addEventListener('click', closeModal);
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && (!modal.classList.contains('hidden') || !modal2.classList.contains('hidden'))) {
      closeModal();
    }
  });

  console.log("Finished loading script.js")
});