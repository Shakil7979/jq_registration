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
 

    // $data = array(
    //     'username'   => 'a',
    //     'phone'   => 0,
    //     'email'   => 'admin@gmail.com',
    //     'address'   => 'dhaka', 
    //     'password'   => 1, 
    //     'action'    => 'login',
    //     'status'   => 100
    // ); 
     
    // $data['username']=$_REQUEST['username'];


     if(isset($_REQUEST['username'])){ 
        $user_username = $_REQUEST['username'];
        $user_phone = $_REQUEST['phone'];
        $user_email = $_REQUEST['email'];
        $user_address = $_REQUEST['address'];
        $user_password = $_REQUEST['password']; 

        if(empty($user_username)){
            echo "User Name Required!";
        }else if(empty($user_phone)){
            echo "Phone Number Required!";
        }else if(empty($user_email)){
            echo "Phone Number Required!";
        }else if(empty($user_address)){
            echo "Phone Number Required!";
        }else if(empty($user_password)){
            echo "Phone Number Required!";
        }else{

            $stm = $pdo->prepare("INSERT INTO registraion(username,phone,email,address,password) VALUES(?,?,?,?,?)");
            $stm->execute(array($user_username,$user_phone,$user_email,$user_address,$user_password));

            echo "Registraion Successfully Done!";



        }
 
    }


    // echo $json_data = json_encode($data);


    

 

?>