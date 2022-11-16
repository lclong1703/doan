<!-- user service -->
<?php
class UserModel{
    private $db;
    function __construct(){
        $this->db = new DB;
    }
    public function insertNewUser($name, $email, $phone, $address,$password){
        $qr = "INSERT INTO customers(name, email, phone, address, password) VALUES ('$name', '$email', '$phone', ' $address','$password')";
        $this->db->query($qr);
        $result = false;
        if($this->db->execute()){
            $result = true;
        }
       return json_encode($result);
    }

    public function accountLogin($phone, $password){
        $qr = "SELECT name FROM customers WHERE phone = '$phone' AND password = '$password'";
        $this->db->query($qr);
        return json_encode($this->db->singleField());
    }

    public function accountAdminLogin($email, $password){
        $qr = "SELECT name FROM staffs WHERE email = '$email' AND password = '$password'";
        $this->db->query($qr);
        return json_encode($this->db->singleField());
    }

    public function countCustomer(){
        $qr = "SELECT COUNT(id) AS soluongkh FROM customers";
        $this->db->query($qr);
        return json_encode($this->db->singleField());
    }

    public function getAddress($id){
        $qr = "SELECT address FROM customers WHERE id = $id";
        $this->db->query($qr);
        return json_encode($this->db->singleField());
    }

    public function getMSKH($name){
        $qr = "SELECT id FROM customers WHERE name = '$name'";
        $this->db->query($qr);
        return json_encode($this->db->singleField());

    }

    public function infoCustomer($name){
        $qr = "SELECT * FROM customers WHERE name = '$name'";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function infoAdmin($name){
        $qr = "SELECT * FROM staffs WHERE name = '$name'";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function updateInfoCustomer($name, $email, $phone, $address, $password){
        $qr = "UPDATE customers SET email= '$email', phone= '$phone', address= '$address', password= '$password' WHERE name = '$name'";
        $this->db->query($qr);
        $this->db->execute();
    }

    public function updateInfoAdmin($name, $address, $phone, $email){
        $qr = "UPDATE staffs SET address = '$address', phone= '$phone', email= '$email' WHERE name = '$name'";
        $this->db->query($qr);
        $this->db->execute();
    }

    //Ajax
    public function checkEmailCustomer($email){
        $qr = "SELECT id FROM customers WHERE email = '$email';";
        $this->db->query($qr);
        $this->db->execute();
        $kq = false;
        if($this->db->rowCount() > 0){
            $kq = true;
        }
        return json_encode($kq);
    }

    public function checkPhoneCustomer($phone){
        $qr = "SELECT id FROM customers WHERE phone = '$phone';";
        $this->db->query($qr);
        $this->db->execute();
        $kq = false;
        if($this->db->rowCount() > 0){
            $kq = true;
        }
        return json_encode($kq);
    }

}
