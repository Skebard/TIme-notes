class Note{
    constructor(){

    }
    loadNotes(date=undefined){
        console.log('hi')
        // if(!date){
        //     let resp = await fetch(config.API+'?url=note/all');
        //     let data = await resp.text();
        //     console.log(data);
        // }
    }
    displayNote(){
        console.log("display");
    }
    createNote(content){
        
        let data = new FormData();
        data.append('content',content);
        data.append('date',Date.now());
        let mydata;
        fetch('http://localhost:8000/?url=note/all/13-12-20',{
            method:'GET'
        })
        .then(resp => resp.text())
        .then(data=>{
            mydata = data;
        })
        .then(e=>console.log(mydata));
    }


    createNoteHTML(){

    }

}

exports.module = Note;