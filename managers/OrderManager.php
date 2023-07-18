<?php

class OrderManager extends AbstractManager {
    
    //Push new order in the database
    public function insertOrder(Order $order){
        
        //Prepare the query
        $query = $this->db->prepare("INSERT INTO orders (date, amount, user_id) VALUES (:date, :amount, :user_id");
        //Bind the paramaters
        $parameters = [
                'date' => $order->getDate(),
                'amount' => $order->getAmount(),
                'user_id' => $order->getUser_id()
            ];
        //Execute the query
        $query->execute($parameters);
        //Get the id of the newly inserted order
        $order->setId($this->db->lastInsertId());
        
        //return Order
        return $order;
    }
}

?>