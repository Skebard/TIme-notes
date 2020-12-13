class Note{
    constructor(){

    }
    displayNote(){
    }
    createNote(content){

        let data = new FormData();
        data.append('content',content);
        data.append('date',Date.now());
        fetch('ww.gsa',{
            method:'POST',
            body:data
        })
    }


    createNoteHTML(){

    }

}