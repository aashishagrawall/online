<?php session_start();
if (!isset($_SESSION['cid'])) {
    die();
}
if ($_POST['logout'] == 1) {
    session_destroy();
    session_unset();
    die('1');
}


?>
<!DOCTYPE html>


<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="https://cdnjs.com/libraries/normalize" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="jquery-3.1.1.js"></script>
    <script src="jquery.modal.js" type="text/javascript" charset="utf-8"></script>

    <style type="text/css">
        a, a:visited, a:focus {
            color: inherit;
            text-decoration: none;
        }
        html{height: 100%;}
        body {
            height:100%;
            background-color: #f6f6f6;
            font-family: "Montserrat", "Open-Sans", sans-serif;
            margin: 0px;
            color: rgba(0, 0, 0, 0.87);
            webkit-font-smoothing: antialiased;
            font-family: "Open Sans";
            font-weight: 400;
            font-style: normal;

        }

        #nav-bar {
            font-family: "Montserrat", "Open-Sans", sans-serif;

            background-color: white;
            padding: 10px 15px;
            min-height: 50px;

            border-bottom: 1px solid #cfcfcf;
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

        #side-bar {
            border-right: 1px solid #cfcfcf;
            font-weight: 500;
            font-size: 14px;
            width: 15%;
            float: left;
            height: 100%;
             background-color: white;

        }

        .bar-item {
            font-family: "Roboto";
            display: flex;
            padding: 5px;
            margin: 5px;
            width: 85%;
            text-align: center;
        }

        .bar-item:hover {
            background-color: #cccccc;
            cursor: pointer;
            border-radius: 3px;
        }
        #main-list-item{
            font-size: 17px;
            padding:5px 3px;
            border-left: 5px solid rgba(61, 110, 166, 0.91);
        }
        #main-list-item:hover{
            font-size: 19px;

            border-left: 5px solid #a93529;
            cursor: pointer;
        }
        #back:hover{
            font-weight: bolder;

            cursor: pointer;
        }
        #student-list-item{  padding:5px;

        }
        #student-list-item #name{
            float: left;


        }
        #student-list-item #score{
             float: left;
            margin-left: 20px;


        }
        #student-list-item #details{
            float: right;
            padding:0px;

            margin-right: 10px;;
        }
        #student-list-item #details:hover{
            float: right;
            padding:5px;
            background-color: #cccccc;
            cursor: pointer;
            border-radius: 3px;
            margin-right: 10px;;
        }
        table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 12px;
            width:100%;
            text-align: left;
            border-collapse: collapse;
            margin: 20px;
        }
        td {
            color: #669;
            border-top: 1px solid #e8edff;
            padding: 10px 15px;
        }

        th{
            font-size: 14px;
            font-weight: bold;
            color: #039;
            padding: 12px 15px;
        }
        tr:hover td {
            color: #339;
            background: #eff2ff;
            cursor: pointer;
        }
        .button_example{
            visibility: hidden;
            width:70px;
            border-color:#3A4C7D;border-width: 0px 0px 2px 0px;border-style: solid;
            -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
            background-color: #a5b8da; background-image: -webkit-gradient(linear, left top, left bottom, from(#a5b8da), to(#7089b3));
            background-image: linear-gradient(to bottom, #a5b8da, #7089b3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a5b8da, endColorstr=#7089b3);
        }

        .button_example:hover{
            cursor: pointer;

            border-color:#3A4C7D;border-width: 0px 0px 2px 0px;border-style: solid;
            background-color: #819bcb; background-image: -webkit-gradient(linear, left top, left bottom, from(#819bcb), to(#536f9d));
            background-image: linear-gradient(to bottom, #819bcb, #536f9d);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#819bcb, endColorstr=#536f9d);
        }
    </style>
</head>
<html>
<div id="nav-bar">
    <div id="nav-bar-logo">
        <img src="logo-2-small.png" height="50px">
    </div>
    <ul dir="ltr" id="nav-bar-list">
        <li id="list-item">Organization:<?php echo $_SESSION['name']; ?>&nbsp;</li>

        <li id="list-item">Account Home</li>

    </ul>


</div>
<div id="main" style="display: flex;flex-direction: row;height: 100%;">
<div id="side-bar">
    <a href="new_test_reg.php">
        <div id="new-test" class="bar-item">Create New Test</div>
    </a>
    <div id="prev-test" class="bar-item">Previous Tests</div>
    <div id="upcoming-test" class="bar-item">Upcoming Tests</div>

    <div id="log-out" class="bar-item">Log Out</div>
</div>
    <div id="area" style="width:100%;height: 100%; margin-left: 10px;
        background-color: white;border-left: 1px solid #cfcfcf;
        padding: 0px 40px;
">

<div id="content" style="display: flex;flex-direction: column">
    <div id="back" style="margin: 10px 0px;padding: 6px;width:inherit"> </div>
<h1> </h1>
    <!-- Modal Structure -->
    <div id="modalNew" class="modal bottom-sheet">
        <div class="modal-content">
            <h4></h4>

        </div>

    </div>
    <table >


    </table>
    <div class="button_example"  >See Results</div>



</div>

    </div>
</div>
<script>
    var testid,stuid,secs;
    var newData,oldData;
    var curr ;
    var topRow =" <tr> <th>Name</th> <th >Date</th> <th>From </th> <th >To</th> <th>Test Code</th></tr>";
    function hideResultButt(hide){
        if(hide){
        $(".button_example").css("visibility","hidden");
        }else{
            $(".button_example").css("visibility","visible");

        }
    }
    function fillNewData(){
        curr="new";
        hideResultButt(true);
        $("h1").html("Upcoming Tests");
        $("table").html('');
        $("table").append(topRow);

        for(i =0;i<10;i++)
        {
             var code = $(newData).find("new test#"+(i+1)).attr("tid");
            var test = $(newData).find("new test#"+(i+1));
            if(code!=undefined){
                var name =test.find("name").html();
                var date =test.find("date").html();
                var to =test.find("to").html();
                var from =test.find("from").html();
                var str ="<tr id='new'>"
                str=str.concat("<td>"+name+"</td>");
                str=str.concat("<td>"+date+"</td>");
                str=str.concat("<td>"+from+"</td>");
                str=str.concat("<td>"+to+"</td>");
                str=str.concat("<td id='testCode'>"+code+"</td>");
                str=str.concat("</tr>");
                $("table").append(str);
            }

        }
    }
    function fillOldData(){
        curr="old";
        hideResultButt(true);

        $("table").html('');
        $("table").append(topRow);
        $("h1").html("Previous Tests");
        for(i =0;i<10;i++)
        {
            var code = $(newData).find("old test#"+(i+1)).attr("tid");
            var test = $(newData).find("old test#"+(i+1));
            if(code!=undefined){
                var name =test.find("name").html();
                var date =test.find("date").html();
                var to =test.find("to").html();
                var from =test.find("from").html();

                var str ="<tr id='old'>"
                str=str.concat("<td>"+name+"</td>")
                str=str.concat("<td>"+date+"</td>")
                str=str.concat("<td>"+from+"</td>")
                str=str.concat("<td>"+to+"</td>")
                str=str.concat("<td id='testCode'>"+code+"</td>")
                str=str.concat("</tr>");
                $("table").append(str);

            }

        }
    }

    function fillSecQues(tid){
        if(curr=="old"){
            hideResultButt(false);
        }
        testid = tid;
        $("table").html('');
        var topRow =" <tr> <th>Section</th> <th >Questions</th> <th>Time</th> </tr>";

        $("table").append(topRow);
        $("h1").html("Test Details");
        var data = $(newData).find("test[tid="+tid+"]");
        var sections =    $(newData).find("test[tid="+tid+"] sections").html();
        secs = sections;
        for(i =0;i<sections;i++)
        {
            var ques = $(newData).find("test[tid="+tid+"] questions#"+(i+1)+"").html();
            var time =  $(newData).find("test[tid="+tid+"] time#"+(i+1)+"").html();
            var str ="<tr>"
            str=str.concat("<td>"+(i+1)+"</td>");
            str=str.concat("<td>"+ques+"</td>");
            str=str.concat("<td>"+time+"</td>");
            $("table").append(str);
        }

    }
    $(function () {


        $("#log-out").click(function () {
                $.post('account_home.php', {logout: 1}, function (data) {
                    if (data == 1) {
                        window.location.href = "index.php";
                    }

                });


            }
        );
    })
    $('#prev-test').click(function () {
        fillOldData();
    });
    $('#upcoming-test').click(function () {
        fillNewData();
    });

    $("body").on('click',"tr#new",(function () {
        var tid=$(this).find("td#testCode").html();
         fillSecQues($(this).find("td#testCode").html());


    }));
    $("body").on('click',"tr#old",(function () {
        var tid=$(this).find("td#testCode").html();
        fillSecQues($(this).find("td#testCode").html());


    }));
    var resultData;
    $(function () {
        $.post('data_getTests.php', null, function (data) {
            newData = data;



        })

    });
    $("body").on('click',".button_example",(function () {
        $.post('data_getStudents.php', {tid:testid,sections:secs}, function (data) {
            resultData = data;
            $("table").html('');
            var topRow =" <tr> <th>Photo</th><th>ID</th> <th >Name</th> <th>CGPA</th> <th>College</th>" +
                "<th>E mail</th><th>Coding Score</th><th>MCQ Score</th></tr>";
            $("table").append(topRow);
            var students = $(resultData).find('number').html();
            for(i=0;i<students;i++){
                var act = $(resultData).find("user#"+(i+1));
                var scr =  $(resultData).find("score#"+(i+1));
                var coding = 0 , mcq = 0;
                for( j=0;j<secs;j++){
                    mcq+= parseInt(scr.find("sectionMarks#"+(j+1)+"[type=0]").html());
                   coding+= parseInt(scr.find("sectionMarks#"+(j+1)+"[type=1]").html());
                }



                var str ="<tr >"
                 str=str.concat("<td><img src='"+act.find("photo").html()+"'></td>")
                str=str.concat("<td>"+act.find("id").html()+"</td>")
                str=str.concat("<td>"+act.find("name").html()+"</td>")
                str=str.concat("<td>"+act.find("cgpa").html()+"</td>")
                str=str.concat("<td>"+act.find("college").html()+"</td>")
                str=str.concat("<td >"+act.find("email").html()+"</td>")
                str=str.concat("<td>"+coding+"</td>")
                str=str.concat("<td >"+mcq+"</td>")
                str=str.concat("</tr>");
                $("table").append(str);
            }

        })


    }));

</script>
</html>