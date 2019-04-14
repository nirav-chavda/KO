<?php
            
class User extends Model {

    private $db;

    public function __construct() {
        # taking connection
        $this->db = new DB;
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

    public function validate($email,$password) {
        
        $this->db->query('SELECT id,password FROM ' . $this->table . ' WHERE email = :email');
        $this->db->bind(':email',$email);
        $row = $this->db->first();

        if( $row && password_verify($password,$row->password)) {
            Ninja\Auth::set($row->id);
            return 1;
        }
        else
            return 0;
    }

    #Override
    public function get($key=null, $name=null) {
        if( empty($key) || empty($name) ) {
            $sql = 'SELECT * , NULL AS password FROM ' . $this->table;
            $this->db->query($sql);
            return $this->db->get();
        } else {
            $sql = 'SELECT * , NULL AS password FROM ' . $this->table . ' WHERE ' . $key . ' = :' . $key;
            $this->db->query($sql);
            $this->db->bind(':' . $key ,$name);
            return $this->db->get();
        }        
    }

    #Override
    public function first($key, $name) {
        if( empty($key) || empty($name) ) {
            $sql = 'SELECT * , NULL AS password FROM ' . $this->table;
            $this->db->query($sql);
            return $this->db->first();
        } else {
            $sql = 'SELECT * , NULL AS password FROM ' . $this->table . ' WHERE ' . $key . ' = :' . $key;
            $this->db->query($sql);
            $this->db->bind(':' . $key ,$name);
            return $this->db->first();
        }        
    }
}