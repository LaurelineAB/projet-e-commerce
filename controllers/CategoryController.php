<?php


class CategoryController extends AbstractController
{
    private CategoryManager $manager;

    public function __construct()
    {
        $this->manager = new CategoryManager();
    }

    public function add()
    {
        if (isset($_POST['submit-new-category'])) {

            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
            }
            if (!empty($_POST['description'])) {
                $description = $_POST['description'];
                $category = $this->manager->getCategoryByName($name);
            }
            if ($category === null) {
                $category = $this->manager->createCategory(new Category($name, $description));
            }
        }
    }

    
    public function edit()
    {
        if (isset($_POST['submit-edit-category'])) {

            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
            }
            if (!empty($_POST['description'])) {
                $description = $_POST['description'];
                $category = $this->manager->getCategoryByName($name);
            }
            if ($category === $category) {
                $editCategory = $this->manager->insertCategory($name, $description);
            }
        }
    }
    
    public function allCategories() 
    {
        $categories = getAllCategories();
        $this->render('homepage/homepage.pĥtml'  => $categories);
        
    }

}
?>





<!--//        // if the form is submitted-->
<!--//        if(isset($_POST["name"]) && isset($_POST["description"]) === "create-category")-->
<!--//        {-->
<!--//            $name = $_POST["category-name"];-->
<!--//            $category = $this->manager->getCategoryByName($name);-->
<!--//            // if the name is not already taken-->
<!--//            if($category === null)-->
<!--//            {-->
<!--//                $category = $this->manager->createCategory(new Category($name));-->
<!--//-->
<!--//                $this->renderJson([-->
<!--//                    "category" => $category-->
<!--//                ]);-->
<!--//            }-->
<!--//-->
<!--//        }-->
<!--    -->






