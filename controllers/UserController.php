<?php

class UserController extends AbstractController {
    
    //ATTRIBUTES
    private UserManager $um;
    private CategoryManager $cm;
    
    //CONSTRUCTOR
    public function __construct()
    {
        $this->um = new UserManager();
        $this->cm = new CategoryManager();
    }
    
    //METHODS
    
    //New user
    public function createUser()
    {
        if(isset($_POST['submit-new-user']))
        {
            //Check if email is already registered
            if($this->um->getUserByEmail($_POST['register-email']) === null)
            {
                if(!empty($_POST['register-first-name']))
                {
                    $firstName = $_POST['register-first-name'];
                }
                if(!empty($_POST['register-last_name']))
                {
                    $lastName = $_POST['register-last-name'];
                }
                if(!empty($_POST['register-email']))
                {
                    $email = $_POST['register-email'];
                }
                //Check if password and password confirmation are the same
                if($_POST['register-password'] === $_POST['register-confirm-password'] && !empty($_POST['register-password']))
                {
                    //Crypted password
                    $password = password_hash($_POST['register-password'], PASSWORD_DEFAULT);
                }
                //Get all adress components in one variable
                if(!empty($_POST['register-adress-number']) && !empty($_POST['register-adress-street']) && !empty($_POST['register-adress-postal-code']) && !empty($_POST['register-adress-city']))
                {
                    $adress = $_POST['register-adress-number']." ".$_POST['register-adress-street']." ".$_POST['register-adress-postal-code']." ".$_POST['register-adress-city'];
                }
                //Set inscription date
                date_default_timezone_set("Europe/Paris");
                $date = date("d/m/Y");
                
                //Create the User
                $user = new User($firstName, $lastName, $email, $password, $adress);
                $user->setInscription_date($date);
                
                //Add user to database
                $this->um->addUser($user);
                
                //Send user to login page
                $this->render("auth/login.phtml", []);
            }
        }
        else
        {
            //Show register form
            $this->render("auth/register.phtml", []);
        }
    }
    
    //Login
    public function loadUser()
    {
        if(isset($_POST['submit-login']))
        {
            //Check if email exists
            if($this->um->getUserByEmail($_POST(['login-email'])))
            {
                $user = $this->um->getUserByEmail($_POST(['login-email']));
                //Check if password is correct
                if(password_verify($_POST(['login-password']), $user->getPassword()))
                {
                    //Login
                    $_SESSION['user'] = $user;
                    //Initialize empty cart
                    $_SESSION['cart'] = [];
                    
                    //Send user to homepage, with array of categories 
                    $this->render("homepage/homepage.phtml", $this->cm->getAllCategories());
                }
            }
        }
        else
        {
            //Show login form
            $this->render("auth/login.phtml", []);
        }
    }
    
    //Edit user
    public function editUser()
    {
        if(isset($_POST['submit-edit']))
        {
            if(!empty($_POST['edit-first-name']))
            {
                $firstName = $_POST['edit-first-name'];
            }
            if(!empty($_POST['edit-last_name']))
            {
                $lastName = $_POST['edit-last-name'];
            }
            if(!empty($_POST['edit-email']))
            {
                $email = $_POST['edit-email'];
            }
            if(!empty($_POST['edit-password']))
            {
                //Crypted password
                $password = password_hash($_POST['edit-password'], PASSWORD_DEFAULT);
            }
            //Get all adress components in one variable
            if(!empty($_POST['edit-adress-number']) && !empty($_POST['edit-adress-street']) && !empty($_POST['edit-adress-postal-code']) && !empty($_POST['edit-adress-city']))
            {
                $adress = $_POST['edit-adress-number']." ".$_POST['edit-adress-street']." ".$_POST['edit-adress-street']." ".$_POST['edit-adress-postal-code']." ".$_POST['edit-adress-city'];
            }
            
            //Create the User
            $user = new User($firstName, $lastName, $email, $password, $adress);
            $user->setId($_POST['edit-id']);
            
            //Call to function
            $this->um->editUser($user);
        }
    }
}

?>