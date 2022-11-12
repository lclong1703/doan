<?php
class ProductModel
{
    private $db;
    function __construct(){
        $this->db = new DB;
    }
    public function listAll()
    {
        $qr = "SELECT * FROM products";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function countProduct()
    {
        $qr = "SELECT COUNT(id) AS quantity FROM products";
        $this->db->query($qr);
        return json_encode($this->db->singleField());
    }

    public function getProduct($id)
    {
        $qr = "SELECT * FROM products WHERE id = $id";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function relatedProducts($category_id, $id)
    {
        $qr = "SELECT * FROM products WHERE category_id = $category_id AND NOT id = $id LIMIT 4";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }


    public function addProduct($name, $description, $quantity, $price, $image, $category_id)
    {
        $qr = "INSERT INTO products(name, description, quantity, price, image, category_id) VALUES ('$name', '$description', '$quantity', '$price', '$image', $category_id)";
        $this->db->query($qr);
        $this->db->execute();
    }

    public function updateProduct($id, $name, $description, $quantity, $price, $image, $category_id)
    {
        $qr = "UPDATE products SET name= '$name',description='$description',quantity=$quantity,price=$price,image='$image',category_id=$category_id WHERE id = $id";
        $this->db->query($qr);
        $this->db->execute();
    }

    public function updateProductNoImg($id, $name, $description, $quantity, $price, $category_id){
        $qr = "UPDATE products SET name= '$name',description='$description',quantity=$quantity,price=$price,category_id=$category_id WHERE id = $id";
        $this->db->query($qr);
        $this->db->execute();
    }

    public function deleteProduct($id){
        $qr="DELETE FROM products WHERE id = $id";
        $this->db->query($qr);
        $this->db->execute();
    }

    public function getProductByCategory($category_id){
        $qr = "SELECT * FROM products WHERE category_id = $category_id";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }

    public function getProductBySearch($searchName){
        $qr = "SELECT * FROM products WHERE name LIKE '%$searchName%'";
        $this->db->query($qr);
        return json_encode($this->db->resultSet());
    }
}
