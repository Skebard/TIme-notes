<?php

class NoteModel extends Model{

    function getAll(){
        $query = 'SELECT content,created_at FROM notes WHERE userId = 1';
        return $this->db->execute($query,[],true);
    }
    function getByDate($date){
        $query = 'SELECT content,created_at FROM notes WHERE userId = 1 AND DATE_FORMAT(created_at,"%d/%m/%y")=? ';
        return $this->db->execute($query,[$date],true);
    }
}