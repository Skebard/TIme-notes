import "./scss/main.scss";

import func1 from './js/func.js';

//*** HTML elements */
const newNoteBtn = document.getElementById('new-note-btn');
const newNoteModal = document.getElementById('new-note-modal');
const newNoteForm = document.getElementById('new-note-form')

//*** Event listeners ***/
newNoteBtn.addEventListener('click', displayModal);
newNoteForm.addEventListener('click', handleNoteForm);




//*** Callbacks */
const newNoteCancelBtn = document.getElementById('new-note-cancel-btn');
const newNoteCreateBtn = document.getElementById('new-note-create-btn');
function handleNoteForm(e) {
    e.preventDefault();
    switch (e.target) {
        case newNoteCancelBtn:
            newNoteModal.classList.add('hide');
            break;
        case newNoteCreateBtn:
            break;
        default:
            break;
    }
}





function displayModal(e) {
    newNoteModal.classList.remove('hide');
}