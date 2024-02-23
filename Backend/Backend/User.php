<?php
    require('../Database.php');
    class User{

        public function doLogin($username,$password){
            return $this->loginFunction($username,$password);
        }

        public function doRegister($gcashqrcode, $name, $email, $password, $confirm, $country) {
            return $this->registerFunction($gcashqrcode, $name, $email, $password, $confirm, $country);
        }

        private function loginFunction($username,$password){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->loginQuery());
                    $md5 = md5($password);
                    $query->execute(array($username,$md5));
                    $role = null;

                    while($row = $query->fetch()){
                        $role = $row['user_type'];
                        $_SESSION['user_id'] = $row['user_id']; 
                        $_SESSION['email'] = $row['email'];
                    }

                    if($role == "1"){
                        $con->closeConnection();
                        return 1;
                    }else if($role == "2"){
                        $con->closeConnection();
                        return 2;
                    }else{
                        return "SomethingIsWrong";
                    }

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function registerFunction($gcashqrcode, $name, $email, $password, $confirm, $country){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->registerQuery());
                    $query->execute(array($name, $email, md5($password), md5($confirm), $country, $gcashqrcode));
                    $result = $query->fetch();
                    $con->closeConnection();

                    if(!$result){
                        return 200;
                    }else{
                        return 400;
                    }

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function loginQuery(){
            return "SELECT * FROM users WHERE email = ? AND password = ? AND is_logged = 1";
        }

        private function registerQuery(){
            return "INSERT INTO `users`(`name`, `email`, `password`, `plain_pw`, `country`, `image`) VALUES (?,?,?,?,?,?)";
        }

    }
?>