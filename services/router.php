<?php

class Router
{
    // private string $route;
    private CategoryController $cc;
    private MediaController $mc;
    private OrderController $oc;
    private ProductController $pc;
    private UserController $uc;

    public function __construct()
    {
        // $this->route = $_GET['route'];
        $this->cc = new CategoryController();
        $this->mc = new MediaController();
        $this->oc = new OrderController();
        $this->pc = new ProductController();
        $this->uc = new UserController();
    }
    
    public function checkRoute()
    {
        if(isset($this->route))
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
                $this->pc->
            }
        }
        else
        {
            $categories = $this->cc->manager->getAllCategories();
            $this->cc->render("views/homepage/homepage.phtml", $categories);
        }
    }
}

?>