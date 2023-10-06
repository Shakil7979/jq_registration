<?php  
    $dbhost = "localhost";
    $dbname = "js_registraion";
    $dbuser = "root";
    $dbpassword = "";
    date_default_timezone_set("Asia/Dhaka");
    try{
        $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Conncetion Error: ".$e->getMessage();
    }
 
 

     if(isset($_REQUEST['f_name'])){   

        $f_name = $_REQUEST['f_name'];
        $l_name = $_REQUEST['l_name'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password']; 
 

        $stm = $pdo->prepare("INSERT INTO registraion(f_name,l_name,phone,email,password) VALUES(?,?,?,?,?)");
        $stm->execute(array($f_name,$l_name,$phone,$email,$password));

        if($stm){
            echo true;
        }else{
            echo false;
        }
 

 
 
    } 


    

 

?>