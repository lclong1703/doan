<!-- category service -->
<?php
class CategoryModel{
    private $db;
    function __construct(){
        $this->db = new DB;
    }
    public function ListAll(){
        
        $qr = "SELECT * FROM categories";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function getCategory($id){
        $qr = "SELECT * FROM categories WHERE id = $id";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }


    public function addCategory($name){
        $qr = "INSERT INTO categories (name) VALUES ('$name')";
        $this->db->query($qr);
        $this->db->execute();
    } 

    public function updateCategory($id, $name){
        $qr = "UPDATE categories SET name= '$name' WHERE id  = $id";
        $this->db->query($qr);
        $this->db->execute();
    } 

    public function deleteCategory($id){
        $qr = "DELETE FROM categories WHERE id = $id";
        $this->db->query($qr);
        $this->db->execute();
    } 

    public function countCategory()
    {
        $qr = "SELECT COUNT(id) AS soluonglhh FROM categories";
        $this->db->query($qr);
        return json_encode($this->db->singleField());
    }
}
?>
