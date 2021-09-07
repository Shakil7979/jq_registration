

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        $successMsg{
            display: none;
        }
        $errorMsg{
            display: none;
        }
    </style>
</head>
<body>
<form mathod="POST" id="login_form">
    <div id="successMsg"></div>
    <div id="errorMsg"></div>

    <div class="form-group">
        <label for="user">User Name: </label>
        <input type="text" name="username" id="username"> <br>
    </div>
    
    <div class="form-group">
        <label for="phone">Phone: </label>
        <input type="text" name="phone" id="phone"> <br>
    </div>
    
    <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email"> <br>
    </div>

    <div class="form-group">
        <label for="address">Address: </label>
        <input type="text" name="address" id="address"> <br>
    </div>
    </div>

    <div class="form-group">
        <label for="user">Password: </label>
        <input type="password" name="password" id="password"> <br>
    </div>

    <div class="form-group">
        <button id="submit_btn" type="submit">Login</button>
    </div>
 
    
</form> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

$('#login_form').on('submit',function(event){
    event.preventDefault();

    var username = $('#username').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var password = $('#password').val(); 

    if(username.length == 0){
        $('#errorMsg').show().text('User Name must be Required!'); 
    }else if(phone.length == 0){
        $('#errorMsg').show().text('Phone must be Required!');
    }else if(email.length == 0){
        $('#errorMsg').show().text('Email must be Required!');
    }else if(address.length == 0){
        $('#errorMsg').show().text('Address must be Required!');
    }else if(password.length == 0){
        $('#errorMsg').show().text('Password must be Required!');
    }else{
        $('#errorMsg').hide(); 
        $.post("http://localhost/jq_registration/response.php", {username:username,phone:phone,email:email,address:address,password:password,action:"login" }, function(result){ 
 
           var json_data =  JSON.parse(result);  
            var res_username  = json_data.username;
            var res_phone  = json_data.phone;
            var res_email  = json_data.email;
            var res_address  = json_data.address;
            var res_password  = json_data.password; 
            var res_status  = json_data.status; 

            if(api_status == 200){
                alert('login success!');
            }else if(api_username != username){
                alert('username worng!');
            }else if(api_password != password){
                alert('password wrong');
            }else{
                alert('Login Successfully!');
            }


             
        });
    }



})

</script>

</body>
</html>
