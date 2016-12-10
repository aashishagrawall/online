<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="https://cdnjs.com/libraries/normalize" href="styles.css">
    <script src="jquery-3.1.1.js"></script>
    <script src="webcamJS/webcam.js"></script>
    <script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
    <script type="text/javascript" async
            src="MathJax-2.6-latest/MathJax.js?config=TeX-AMS_CHTML">
    </script>
    <style>
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

        #button:hover, #button:visited  {
            opacity: 1;
        }
      
    </style>
</head>
<html>



<div id="nav-bar" >
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
    <div id="register-tag">Register</div>
    <div id="input-group">
        <label for="code">Test Code</label><br>
        <input type="text" name="code" required placeholder="Code">
    </div>
    <div id="input-group">
        <label for="full-name">Full Name</label><br>
        <input type="text" name="full-name" required placeholder="Name">
    </div>
    <div id="input-group">
        <label for="id">College ID</label><br>
        <input type="number" name="id" required placeholder="College ID/Roll NO.">
    </div>
    <div id="input-group">
        <label for="DOB">Date Of Birth</label><br>
        <input type="date" name="DOB" required>
    </div>
    <div id="input-group">
        <label for="email">E-Mail</label><br>
        <input type="email" name="email" required placeholder="E-Mail">
    </div>
    <div id="input-group">
        <label for="college">College</label><br>
        <input type="text" name="college" required placeholder="College Name">
    </div>
    <div id="input-group">
        <label for="cgpa">CGPA</label><br>
        <input type="number" name="cgpa" required placeholder="CGPA">
    </div>
    <div id="input-group">
        <label  >Photo</label><br>

        <div id="my_camera"  style="visibility:collapse;width:100%; height:240px;"></div>
        <div id="my_result"></div>
        <div id="button">
        <a href="javascript:void(take_snapshot())" class="snapshot">Take Snapshot</a>
</div>
      </div>
    <div id="button" class="start">
        Start Test
    </div>
</div>
<script>
    var photo='';
    var cameraOpen = false;
    function take_snapshot() {
        if(!cameraOpen){
            $(".snapshot").html("Click");
            $("#my_camera").css("visibility","visible");
            cameraOpen=true;
        }
        else{
        Webcam.snap( function(data_uri) {

            document.getElementById('my_camera').innerHTML = '<img   height="226px" width="285px" src="'+data_uri+'"/>';
            photo=data_uri;
            $(".snapshot").css("visibility","collapse");
        } );
        }
    }
    $(function () {
        Webcam.attach( '#my_camera');


        $("#button.start").click(function () {
            var A = {
                code: $("input[name='code'").val(),
                name: $("input[name='full-name'").val(),
                id: $("input[name='id'").val(),
                dob: $("input[name='DOB'").val(),
                email: $("input[name='email'").val(),
                college: $("input[name='college'").val(),
                cgpa: $("input[name='cgpa'").val(),
                photo:photo
            };

            for (var i in A) {
                if (A[i] == ''  ) {
                    alert('No field can be empty.');
                    return;
                }
            }
            $.post('take_test_reg_server.php', A, function (data) {
                if (data == 2) {
                    window.location.href = "test-screen.php";
                }
                else if (data == 1) {
                    alert("User has given or is giving the test currently.");

                }
                else if (data == 3) {
                    alert("Wrong test code.No such code exists");

                }
                else if (data == 4) {
                    alert("Test has not started/or has expired.");

                } else {

                    alert("Could not register in.Check connection.");


                }

            });
        });

    })


</script>
</html>