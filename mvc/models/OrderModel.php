<?php
class OrderModel{
    private $db;
    function __construct(){
        $this->db = new DB;
    }
    public function listAll(){
        $qr = "SELECT DH.id, GROUP_CONCAT(HH.name ORDER BY name ASC SEPARATOR '<br/>')AS name, GROUP_CONCAT(CT.price ORDER BY CT.price ASC SEPARATOR ',')AS price, GROUP_CONCAT(CT.quantity ORDER BY CT.quantity ASC SEPARATOR '<br/>')AS quantity, order_date, delivery_date, delivery_address, status, customer_id FROM orders AS DH JOIN order_details AS CT ON DH.id = CT.order_id JOIN products AS HH ON CT.product_id=HH.id GROUP BY DH.id";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function getOrderByMSKH($customer_id){
        $qr = "SELECT DH.id, GROUP_CONCAT(HH.name ORDER BY name ASC SEPARATOR '<br/>')AS name, GROUP_CONCAT(CT.price ORDER BY CT.price ASC SEPARATOR ',')AS price, GROUP_CONCAT(CT.quantity ORDER BY CT.quantity ASC SEPARATOR '<br/>')AS quantity, order_date, delivery_date, status, customer_id FROM orders AS DH JOIN order_details AS CT ON DH.id = CT.order_id JOIN products AS HH ON CT.product_id=HH.id GROUP BY DH.id HAVING customer_id = $customer_id";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function getOrderBySodondh($id){
        $qr = "SELECT * FROM orders WHERE id = $id";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function updateOrder($id, $delivery_date, $status){
        $qr= "UPDATE orders SET delivery_date= '$delivery_date', status='$status' WHERE id = $id";
        $this->db->query($qr);
        $this->db->execute();
    }

    public function deleteDetailOrder($id){
        $qr = "DELETE FROM order_details WHERE order_id = $id";
        $this->db->query($qr);
        $this->db->execute();
    }

    public function deleteOrder($id){
        $qr = "DELETE FROM orders WHERE id = $id";
        $this->db->query($qr);
        $this->db->execute();
    }
}
?>
