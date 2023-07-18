<?php

require_once "AbstractManager.php";

class ProductManager extends AbstractManager
{
    //Get product by id
    public function getProductById(int $id) : Product
    {
        $query = $this->db->prepare("SELECT * FROM products WHERE products.id = ?");
        $query->execute([$id]);
        $fetch = $query->fetch(PDO::FETCH_ASSOC);
        $product = new Product($fetch['name'], $fetch['description'], $fetch['price']);
        $product->setId($fetch['id']);
        return $product;
    }
    
    //Get products by category
    public function getProductsByCategory(Category $category) : array
    {
        $query = $this->db->prepare
            ("SELECT products.*, products_categories.category_id 
            FROM products JOIN products_categories
            ON products_categories.product_id = products.id
            WHERE category_id = ?");
        $query->execute([$category->getId()]);
        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach($fetch as $item)
        {
            $product = new Product($item['name'], $item['description'], $item['price']);
            $product->setId($item['id']);
            array_push($products, $product);
        }
        return $products;
    }
}

?>