<!DOCTYPE html>
<?php
session_unset();
session_destroy();
 

?>
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="https://cdnjs.com/libraries/normalize" href="styles.css">
    <style type="text/css">
        a,a:visited,a:focus{
          color: inherit;
            text-decoration: none;
        }
        body {

            font-family: "Montserrat", "Open-Sans", sans-serif;
            margin: 0px;
            background-image: url("homepage.png");
            color: rgba(0,0,0,0.87);
            webkit-font-smoothing: antialiased;
            
            font-style: normal;
        }

        #nav-bar {
            background-color: white;
            padding: 10px 15px;
            min-height: 50px;

            box-shadow: 0 0 5px 0 dimgray;
        }

        #nav-bar-logo {
            position: absolute;

           top: 10px;
            text-align: center;
            float: left;

            font-size: 20px;


        }

        #nav-bar-list {
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

        #nav-bar-list li {
            position: relative;

            padding: 10px;

            border-radius: 5px;

        }

        #main-body {

            text-shadow: 0 1px 3px rgba(0, 0, 0, .42);
            padding-top: 105px;
        }

        #test-text {
            display: block;
            text-align: center;
            font-family: "Open Sans";
            font-size: 4.75rem;
            font-weight: 100;
            color: aliceblue;
            width: 100%;
            letter-spacing: 5px;
            clear: both;
        }

        #below-heading {
            color: aliceblue;
            font-family: "Open Sans";
            width: 100%;
            clear: both;
            text-align: center;

            letter-spacing: 5px;
        }
        #buttons{
            display: inline-block;
            margin-top: 80px;
            flex-direction: column;
            align-content: center;
            width: 100%;
            text-align: center;
        }
        #button{
            font-family: "Montserrat";
            color: aliceblue;
            text-align: center;
            border-radius: ;
            padding: 10px;
            margin: 10px;
            font-weight: 400;
            display:inline-block;
            background-color: #a93529;
            border-bottom: 7px solid transparent;

            border-color: #80281f;
            white-space: nowrap;
            padding: 4px 16px 5px;
            font-size: 16px;
            line-height: 1.5625;
            border-radius:  3px;
            opacity: .5;
            cursor: pointer;
            width:200px;
        }
        #button:hover{
            opacity: 1;
        }
        #list-item{
            font-weight: 500;
            border-radius: 0px;
            color: #505050;
            cursor: pointer;
            border-bottom: thin;
          }

    </style>
</head>
<html>
<div id="nav-bar">
    <div id="nav-bar-logo" >
<img src="logo-2-small.png"height="50px" >
    </div>
    <ul dir="ltr" id="nav-bar-list">
        <li id="list-item"><a href="login.php">Log In</a></li>
        <li id="list-item"><a href="create-account.php">Create Account</a></li>
     </ul>
</div>
<div id="main-body">
    <div id="test-text">
        TESTING,Evolved
    </div>
    <div id="below-heading">
        Easy to use testing platform.
    </div>
</div>
<div id="buttons">

    <div id = "button">
       <a href="take_test_reg.php">Take a Test</a>
    </div>
    <div id="button">
        <a href="login.php">Organize a Test</a>
    </div>

</div>
</html>