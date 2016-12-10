<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="https://cdnjs.com/libraries/normalize" href="styles.css">
    <script src="jquery-3.1.1.js"></script>

    <style type="text/css">
        a,a:visited,a:focus{
            color: inherit;
            text-decoration: none;
        }
        body {
            background-color: #f6f6f6;
             margin: 0px;

            color: rgba(0,0,0,0.87);
            webkit-font-smoothing: antialiased;

            font-weight: 400;
            font-style: normal;
        }
        #nav-bar {

            background-color: white;
            padding: 10px 15px;
            min-height: 50px;

            box-shadow: 0 0 5px 0   #cfcfcf;;
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

        #list-item{
            font-weight: 500;
            border-radius: 0px;
            color: #505050;
            cursor: pointer;
            border-bottom: thin;
            font-family: "Montserrat", "Open-Sans", sans-serif;
        }

        #register{
            margin-left: 30.33%;
            margin-top: 50px;
            min-width:220px;
            width:40%;
            padding:25px;
            background-color: white;
            border-radius: 3px;
            box-shadow: 0 2px 4px rgba(0,0,0,.15);
            display:block;
            font-family: "Open Sans";
            margin-bottom: 40px;
        }
        #register-tag{
            padding-bottom: 20px;
            margin-bottom: 25px;
            text-align: center;
            font-size:32px;
            border-bottom: 1px solid #cfcfcf;
        }

        #input-group{
            display: block;
            margin-bottom: 10px;
        }
        input{
            width: 90%;
            height: 30px;
            padding: 5px 16px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            font-size: 16px;
            line-height: 1.5625;
            color: #7a7a7a;
            display: block;
        }
        label{
            display: inline-block;
            margin-bottom: 10px;
            font-family: "Montserrat", "Open-Sans", sans-serif;
        }

        #button{
            font-family: "Montserrat";
            color: aliceblue;
            text-align: center;
            border-radius: ;
            padding: 10px;

            font-weight: 400;
            display:inline-block;
            background-color: #a93529;
            border-bottom: 4px solid transparent;
            opacity: .8;
            border-color: #80281f;
            white-space: nowrap;
            padding: 4px 16px 5px;
            font-size: 16px;
            line-height: 1.5625;
            border-radius:  3px;
            opacity: .5;
            cursor: pointer;
            width:90%;
            margin-top:15px;
        }
        #button:hover{
            opacity: 1;
        }
    </style>
</head>
<html>
<div id="nav-bar">
    <div id="nav-bar-logo" >
        <img src="logo-2-small.png"height="50px" >
    </div>
    <ul dir="ltr" id="nav-bar-list">
        <?php session_start(); if(isset($_SESSION['cid']))
        {

        ?>
        <li id="list-item"><a href="account_home.php">Account Home</a> </li>


    <?php

        }
        else{
            ?>
            <li id="list-item"><a href="login.php"> Log In</a></li>


            <?php

        }


?>
    </ul>
</div>
<?php


if(isset($_SESSION['cid']))
{
?>
    <div id="register">
    <div id="register-tag">New Test</div>


    <div id="input-group">
        <label for="test-name">Test Name</label><br>
        <input type="text" name="Test-Name" required placeholder="Name of Test">
    </div>
    <div id="input-group">
        <label for="DOT">Date Of Test</label><br>
        <input type="date" name="DOT" required >
    </div>

    <div id="input-group">
        <label for="valid-from">Link Valid From On Test Date</label><br>
        <input type="time" name="valid-from" required placeholder="valid-from">
    </div>
    <div id="input-group">
        <label for="valid-till">Link Valid Till On Test Date</label><br>
        <input type="time" name="valid-till" required placeholder="valid-till">
    </div>
    <div id = "button"    class="makeTest">
        Create Test
    </div>


</div>
<?php } ?>
<script>
    $(function () {
        $("#button").click(function () {
            var A = {
                testName: $("input[name='Test-Name'").val(),
                dot:$("input[name='DOT'").val(),
                validFrom: $("input[name='valid-from'").val(),
                validTill:$("input[name='valid-till'").val()

            };
            for (var i in A) {
                if (i == '') {
                    alert('No field can be empty.');
                    return;
                }
            }
            $.post('new_test_reg_server.php',A,function (data) {
                if(data==0){
                    alert("Could not create test.Check Connection");
                }else{
                window.location.href = "create_test.php";


                }

            });
        });

    })


</script>

</html>