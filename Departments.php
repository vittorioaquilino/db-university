<?php 
// creo la classe departments
class Departments {
    public $name;
    public $surname;
    public $address;
    public $phone;
    public $email;
    public $website;
    public $head_of_department;

    function __construct($_id, $_name)
    {
        $this->id = $_id;
        $this->name = $_name;
    }

    public function setContactData($_address, $_phone, $_email, $_website) {
        $this->address = $_address;
        $this->phone = $_phone;
        $this->email = $_email;
        $this->website = $_website;
    }
    
      public function getContactsAsArray() {
        return [
          "address" => $this->address,
          "phone number" => $this->phone,
          "email address" => $this->email,
          "website" => $this->website,
        ];
    }
}
?>