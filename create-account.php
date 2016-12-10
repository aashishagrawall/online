<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="https://cdnjs.com/libraries/normalize" href="styles.css">
    <script src="jquery-3.1.1.js"></script>

    <style type="text/css">
        a, a:visited, a:focus {
            color: inherit;
            text-decoration: none;
        }

        body {
            background-color: #f6f6f6;
            font-family: "Montserrat", "Open-Sans", sans-serif;
            margin: 0px;
        }

        #nav-bar {

            background-color: white;
            padding: 10px 15px;
            min-height: 50px;

            box-shadow: 0 0 5px 0 #cfcfcf;;
        }

        #nav-bar-list li {
            position: relative;

            padding: 10px;

            border-radius: 5px;

        }

        #nav-bar-logo {
            position: absolute;

            top: 10px;
            text-align: center;
            margin-right: 48%;

            font-size: 20px;

        }

        #nav-bar-list {
            float: left;
            align-content: center;
            color: #7a7a7a;
            font-size: 12.8px;
            padding-top: 8px;
            padding-bottom: 8px;
            display: flex;
            font-weight: 500;
            list-style: none;
            float: right;
            margin: 0px;
        }

        #list-item {
            font-weight: 500;
            border-radius: 0px;
            color: #505050;
            cursor: pointer;
            border-bottom: thin;
        }

        #register {
            margin-left: 30.33%;
            margin-top: 50px;
            min-width: 220px;
            width: 30%;
            padding: 25px;
            background-color: white;
            border-radius: 3px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .15);
            display: block;
            font-family: "Open Sans";
            margin-bottom: 40px;
        }

        #register-tag {
            padding-bottom: 20px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 32px;
            border-bottom: 1px solid #cfcfcf;
        }

        #input-group {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 90%;
            height: 30px;
            padding: 5px 16px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            font-size: 16px;
            line-height: 1.5625;
            color: #7a7a7a;
            display: block;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
            font-family: "Montserrat", "Open-Sans", sans-serif;
        }

        #button {
            font-family: "Montserrat";
            color: aliceblue;
            text-align: center;
            border-radius:;
            padding: 10px;

            font-weight: 400;
            display: inline-block;
            background-color: #a93529;
            border-bottom: 4px solid transparent;
            opacity: .8;
            border-color: #80281f;
            white-space: nowrap;
            padding: 4px 16px 5px;
            font-size: 16px;
            line-height: 1.5625;
            border-radius: 3px;
            opacity: .5;
            cursor: pointer;
            width: 90%;
            margin-top: 15px;
        }

        #button:hover {
            opacity: 1;
        }
    </style>
</head>
<html>
<div id="nav-bar">
    <div id="nav-bar-logo">
        <img src="logo-2-small.png" height="50px">
    </div>

    <ul dir="ltr" id="nav-bar-list">
        <li id="list-item"><a href="login.php"> Log In</a></li>
        <li id="list-item"><a href="create-account.php">Create Account</a></li>
        <li id="list-item"><a href="index.php">Back</a></li>

    </ul>
</div>

<div id="register">
    <div id="register-tag">Create Account</div>

    <div id="input-group">
        <label for="user-id">Organization Name</label><br>
        <input type="text" name="user-id" required placeholder="ID">
    </div>

    <div id="input-group">
        <label for="password">Password</label><br>
        <input type="password" name="password" required placeholder="Password">
    </div>
    <div id="input-group">
        <label for="email">Email</label><br>
        <input type="email" name="email" required placeholder="E-Mail">
    </div>


    <div id="button" class="create Account">
        Create Account
    </div>
</div>
<script>
    $(function () {

        $("#button").click(function () {
            var A = {
                email: $("input[name='email'").val(),
                password:$("input[name='password'").val(),
                name : $("input[name='user-id'").val()
            };
            if(A.email=='' || A.name=='' || A.password=='')
            { alert("Field cannot be empty");return;}

            $.post('create_account_server.php',A,function (data) {
                if(data==1){
                    alert("Registration Complete.");
                }else{
                    alert("Registration couldn't be completed.");

                }

            });
        });

    })


</script>
</html>
