<?php
    class Contact{

        private $contact_address;
        private $contact_name;
        private $contact_phone;
        // Constructor
        function __construct($address,$name,$phone){
            $this->contact_address = $address;
            $this->contact_name = $name;
            $this->contact_phone = $phone;
        }
        // Setters
        function setAddress($address){
            $this->contact_address = (string) $address;
        }
        function setName($name){
            $this->contact_name = (string) $name;
        }
        function setPhone($phone){
            $this->contact_phone = (string) $phone;
        }
        // Getters
        function getAddress(){
            return $this->contact_address;
        }
        function getName(){
            return $this->contact_name;
        }
        function getPhone(){
            return $this->contact_phone;
        }
        //Methods
        function save(){
            array_push($_SESSION['list_of_contacts'], $this);
        }
        static function getAll(){
            return $_SESSION['list_of_contacts'];
        }
        static function deleteAll(){
            $_SESSION['list_of_contacts'] = array();
        }

    }
?>
