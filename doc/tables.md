Liste des tables :
    - users : id, first_name, last_name, email, password, adress, inscription_date
    - products : id, name, description, price
    - orders : id, date, amount, user_id
    - medias : id, name, url, product_id
    - categories : id, name, description
    - products_categories : product_id, category_id
    - orders_products : order_id, product_id
    
Relations :
    - orders.user_id = users.id
    - medias.product_id = products.id
    - orders_products.order_id = orders.id
    - orders_products.product_id = products.id
    - products_categories.product_id = products.id
    - products_categories.category_id = categories.id