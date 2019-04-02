<?php
            
class User {

    private $db;

    public function __construct() {
        // taking connection
        $this->db = new Model;
        $this->table = 'users';
    }

    public function checkEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email',$email);
        $row = $this->db->first();
        if($row)
            return 1;
        else
            return 0;
    }

    
    public function insert($data) {
            
        $sql = 'INSERT INTO '. $this->table . '(';
        $values = ' VALUES(';
        
        foreach ($data as $key => $value) {
            $sql .= $key . ',';
            $values .= ':' . $key . ',';
        }

        $sql = rtrim($sql,',');
        $values = rtrim($values,',');

        $sql .= ')';
        $values .= ')';

        $sql .= $values;

        $this->db->query($sql);
        foreach ($data as $key => $value) {
            $this->db->bind(':' . $key , $value);
        }
        $this->db->execute();
    }

    public function validate($email,$password) {
        
        $this->db->query('SELECT id,password FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind(':email',$email);
        $row = $this->db->first();

        if( $row && password_verify($password,$row->password))
            return 1;
        else
            return 0;
    }

    public function getUser($key,$value) {
        $this->db->query('SELECT * , NULL AS password FROM ' . $this->table . ' WHERE ' . $key .' = :' . $key);
        $this->db->bind(':'. $key,$value);
        $row = $this->db->first();
    }

    public function getUsers($key,$value) {
        $this->db->query('SELECT * , NULL AS passowrd FROM ' . $this->table . ' WHERE ' . $key .' = :' . $key);
        $this->db->bind(':'. $key,$value);
        $row = $this->db->get();
    }
}