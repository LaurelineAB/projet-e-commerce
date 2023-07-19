<?php

class Router
{
    private CategoryController $cc;
    private MediaController $mc;
    private OrderController $oc;
    private ProductController $pc;
    private UserController $uc;

    public function __construct()
    {
        $this->cc = new CategoryController();
        $this->mc = new MediaController();
        $this->oc = new OrderController();
        $this->pc = new ProductController();
        $this->uc = new UserController();
    }
    
    public function checkRoute()
    {
        $categories = $this->cc>AllCategories();
        $this->cc->render("views/partials/_header.phtml", $categories);
        
        if(isset($_GET['route']))
        {
            if($_GET['route'] === "homepage")
            {
                $categories = $this->cc->manager->getAllCategories();
                $this->cc->render("views/homepage/homepage.phtml", $categories);
            }
            else if($_GET['route'] === "register")
            {
                $this->uc->createUser();
            }
            else if($_GET['route'] === "login")
            {
                $this->uc->loadUser();
            }
            else if($_GET['route'] === "category" && isset($_GET['category_id']))
            {
                $this->pc->getProductsByCategory();
            }
        }
        else
        {
            $categories = $this->cc->AllCategories();
            // $this->cc->render("views/homepage/homepage.phtml", $categories);
        }
    }
}

?>