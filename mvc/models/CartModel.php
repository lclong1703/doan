<!-- cart service -->
<?php
class CartModel{
    private $db;
    function __construct(){
        $this->db = new DB;
    }
    public function getProduct($id){
        $qr = "SELECT * FROM products WHERE id = $id";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function insertCheckOut($customer_id, $staff_id, $order_date, $delivery_address){
        $qr = "INSERT INTO orders(customer_id, staff_id, order_date, delivery_address) VALUES($customer_id, $staff_id, '$order_date', '$delivery_address');";
        $this->db->query($qr);
        $this->db->execute();
        $qr1 = "SELECT MAX(id) AS order_id FROM orders";
        $this->db->query($qr1);
        return json_encode($this->db->singleField());
    } 
    
    public function insertDetailCheckOut($order_id, $product_id, $quantity, $price){
        $qr = "INSERT INTO order_details(order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price');";
        $this->db->query($qr);
        $this->db->execute();
        return $qr;
    }
}
?>
