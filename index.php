<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        #successMsg {
            display: none;
            color: green;
            text-align: center;
            margin-bottom: 25px;
            padding: 10px 0;
            background: #00800042;
            border-radius: 3px;
        } 
        #errorMsg {
            display: none;
            color: red;
            text-align: center;
            margin-bottom: 25px;
            padding: 10px 0;
            background: #ff000038;
            border-radius: 3px;
        }
    </style>
    </style>
</head>

<body>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Registration Form</h2>
            </div>
            <div id="successMsg"></div>
            <div id="errorMsg"></div>
            <div class="row clearfix">
                <div class="">
                    <form mathod="POST" id="login_form">
                        <div class="row clearfix">
                            <div class="col_half">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                    <input type="text" name="name" id="f_name" placeholder="First Name" />
                                </div>
                            </div>
                            <div class="col_half">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                    <input type="text" name="name"  id="l_name" placeholder="Last Name" />
                                </div>
                            </div>
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="email" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                            <input type="text" name="Mobile" id="phone" placeholder="Mobile"  />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" id="password" placeholder="Password"  />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" id="re_password" placeholder="Re-type Password"  />
                        </div>
                        <input id="submit_btn" type="submit" class="button" value="Register" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p class="credit">Developed by <a href="https://shakil7979.github.io/portfolio/" target="_blank">Sadbin</a></p>
 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $('#login_form').on('submit', function(event) {
            event.preventDefault();

            var f_name = $('#f_name').val();
            var l_name = $('#l_name').val();
            var email = $('#email').val(); 
            var phone = $('#phone').val();
            var password = $('#password').val();
            var re_password = $('#re_password').val();

            if (f_name.length == 0) {
                $('#errorMsg').show().text('First Name must be Required!');
            } 
            else if (l_name.length == 0) {
                $('#errorMsg').show().text('Last Name must be Required!');
            } 
            else if (email.length == 0) {
                $('#errorMsg').show().text('Email must be Required!');
            } 
            else if (phone.length == 0) {
                $('#errorMsg').show().text('Phone must be Required!');
            } 
            else if (password.length == 0) {
                $('#errorMsg').show().text('Password must be Required!');
            } 
            else if (re_password.length == 0) {
                $('#errorMsg').show().text('Re-Password must be Required!');
            } 
            else if (re_password != password) {
                $('#errorMsg').show().text('Password Re-password not match!');
            } 
            else {
                $('#errorMsg').hide();
                $.post("http://localhost/jq_registration/response.php", {
                    f_name: f_name,
                    l_name: l_name,
                    phone: phone,
                    email: email, 
                    password: password, 
                }, function(result) {  
                    var json_data = JSON.parse(result);   
                    if (result == 1) { 
                        $('#successMsg').show().text('Registraion Success!'); 
                    }  else{
                        $('#errorMsg').show().text('Something wrong!');
                    } 
                });
            }  
        })
    </script> 
</body> 
</html>