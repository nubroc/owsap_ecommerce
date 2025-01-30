 <?php 


 class RegisterController{


    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"] ;
            $fullname = $_POST["fullname"] ;
            $email = $_POST["email"] ;
            $password = $_POST["password"] ;
    
                $userModel = new User();
    
                $result = $userModel->register($name, $fullname, $email, $password);
    
                if ($result) {
                    header("Location: /login");
                    exit();
                }
            }
        
            require "views/registration.php";
        }


}