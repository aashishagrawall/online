
<?php session_start();
require ('common_function.php');
 $db = dbConn();
 if($db==null)
{
    echo '404';
    die(0);

}
$pid = $_SESSION['pid'];
$tid = $_SESSION['tid'];


$sql0 = "select * from  `users`  where
             `PID`='$pid' and `TID`='$tid';";
$result = $db->query($sql0);
if(!$result   ){
    echo '404';
    die('0');

}
 while($row=$result->fetch_assoc()){
    if($row['given']==1)
    {
        die(1);
    }
    else{

      //  $sql0 = "update `users` set `given`=1 where
      //       `PID`='$pid' and `TID`='$tid';";
      //  $result = $db->query($sql0);
    }
}

if (!isset($_SESSION['cid']) || !isset($_SESSION['tid']) || !isset($_SESSION['pid'])) {
    die();
}?>

<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <script src="/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="https://cdnjs.com/libraries/normalize" href="styles.css">
    <script src="jquery-3.1.1.js"></script>
    <script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
    <script type="text/javascript" async
            src="MathJax-2.6-latest/MathJax.js?config=TeX-AMS_CHTML"></script>
    <style type="text/css">
        a, a:visited, a:focus {
            color: inherit;
            text-decoration: none;
        }

        html {
            height: 100%;
        }

        body {
            height: 100%;
            background-color: #f6f6f6;
            line-height: 24px;;
            font-size: 15px;
            color: rgba(0, 0, 0, 0.87);
            webkit-font-smoothing: antialiased;
            font-family: "Open Sans";
            font-weight: 400;
            font-style: normal;
            margin: 0px;
        }

        #nav-bar {
            width: 100%;
            background-color: white;
            padding: 10px 10px;

            display: table;
            border-bottom: 1px solid #cfcfcf;
        }

        #nav-bar-list li {
            position: relative;

            padding: 10px;

            border-radius: 5px;

        }

        #timer {
            padding: 5px;
            display: flex;
            float: left;
            height: 100%;

        }

        #end-test:hover,#sub-sec:hover {
            background-color: #cccccc;
            cursor: pointer;
            border-radius: 3px;
        }

        #end-test,#sub-sec {

            padding: 5px;
            float: right;
            display: table-cell;
            vertical-align: middle;
            margin-right: 20px;
            height: 100%;

        }

        #time-bar {

            padding-left: 5px;
            font-weight: 200;
            cursor: pointer;
            border-radius: 3px;
        }

        #main {
            height: 100%;
            display: flex;

        }

        #ques-bar {
            float: left;
            height: 100%;
            width: 200px;
            background-color: white;
            border-right: 1px solid #cfcfcf;
        }

        section {
            padding: 10px;;
            text-align: center;
            border-bottom: 1px solid #cfcfcf;
        }

        #qgroup {

            display: flex;
            text-align: center;

        }

        .question {
            border-radius: 10px;
            margin: 5px 5px;
            border: 1px solid #cfcfcf;
            width: 33.333%;
        }

        .question:hover {
            cursor: pointer;
            background-color: rgba(113, 110, 109, 0.2);
        }

        .done {
            background-color: rgba(151, 255, 92, .4);
        }

        #area {
            line-height: 24px;;
            font-size: 15px;
            color: rgba(0, 0, 0, 0.87);
            webkit-font-smoothing: antialiased;
            font-family: "Open Sans";
            font-weight: 400;
            font-style: normal;
            display: inline-block;
            height: 90%;
            border-left: 1px solid #cfcfcf;
            border-right: 1px solid #cfcfcf;
            margin-left: 10px;
            width: 100%;
            overflow:scroll  ;
            margin-right: 50px;
            background-color: white;
        }

        #MCQ, #answer, #code-question {
            padding: 20px;
            display: inline-block;
            width: 90%;
        }

        input {
            padding: 5px;

        }

        input:hover {
            cursor: pointer;
        }

        #question-no {
            margin: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #cfcfcf;
        }

        #constraints {
            padding: 20px;
        }

        #border {
            margin: 20px;
            border-bottom: 1px solid #cfcfcf;
        }

        #i-o {
            padding: 20px;
            display: flex;
            flex-direction: row;
        }

        #input, #output {
            margin-bottom: 10px;
            width: 50%;
            border-radius: 3px;
        }

        #code-here {
            float: left;
        }

        #choose-lang {
            float: right;
        }

        #code-head {
            margin: 20px;
            display: block
        }

        #editor {
            width: 80%;
            height: 400px;
            border: 1px solid #cfcfcf;

            margin: 60px 60px 60px 20px;
        }

        #custom-input {
            margin: 20px;
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
            width: 100px;
            margin-top: 15px;
        }

        #button:hover {
            opacity: 1;
        }

        .lang-choice:hover {
            cursor: pointer;
            background-color: #cccccc;
        }

        .lang-choice {
            background-color: white;
        }

        #notice {
            width: 100%;
            height: 100%;
            background-color: white;
            position: absolute;
            top: 0px;
        }

        #rules {
            margin-top: 50px;
            margin-right: 20%;
            margin-left: 20%;
            text-align: center;
        }

        #start {
            font-family: "Montserrat";
            color: aliceblue;
            text-align: center;
            border-radius:;

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
            margin-top: 15px;
        }

        #start:hover, #start:visited {
            opacity: 1;
        }
    </style>
</head>
<html oncopy="return false" oncut="return false" onpaste="return false">
<div id="notice">
    <div id="rules">
        <h1>Information</h1>
        <h2></h2>
        <div id="ins" style="text-align: left"><b>Instructions here</b></div>
        <ul>
            <li>Do not Copy Paste anything.</li>
            <li>Do not refresh the page in any scenario.</li>
            <li>Do not leave full screen.</li>


        </ul>
        <div id="start">Start Test</div>
    </div>
</div>

<div id="nav-bar" style="visibility: hidden">
    <div id="timer">Timer :
        <div id="time-bar">TIMER</div>
        <div id="min">Minutes</div>

    </div>
    <div id="sub-sec">Submit Section</div>

    <div id="end-test">Submit Test</div>


</div>
<div id="main" style="visibility: hidden">
    <div id="ques-bar">

</div>



</div>
<script >
    var warning=false;
    $(function(){
        $("html").bind("cut copy paste",function(e) {
            e.preventDefault();
        });
    });




    function createArray(length) {
        var arr = new Array(length || 0),
            i = length;

        if (arguments.length > 1) {
            var args = Array.prototype.slice.call(arguments, 1);
            while (i--) arr[length - 1 - i] = createArray.apply(this, args);
        }

        return arr;
    }
    function toggleFullScreen() {
        if (!document.fullscreenElement &&    // alternative standard method
            !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {  // current working methods
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    }

    document.addEventListener("fullscreenchange", onFullScreenChange, false);
    document.addEventListener("webkitfullscreenchange", onFullScreenChange, false);
    document.addEventListener("mozfullscreenchange", onFullScreenChange, false);

    function onFullScreenChange() {
        var fullscreenElement = document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement;

        if(fullscreenElement==null){
            if(!warning)
            {alert('Warning : Full Screen is needed.Next your test will be over.');toggleFullScreen();}
            else{
                alert('Sorry.Your test is Over.');
                window.location.href='index.php';
            }
        }
    }

    var editor;
    var currSec = 0,currQues=-1;
    var questions;
    var time ;
    var str='';
    var DATA;
    $(function () {





    });
    function fillBar(sec){
        str='';
        sec=sec-1;
        var temp = questions[sec];
        $('#ques-bar').empty();
        $('#ques-bar').html('<section>Section '+(sec+1)+'<br><span>'+time[sec]+ ' Minutes</span></section>');

            for( i =1 ;i<=temp;){
                str=str+'<div id="qgroup">';
                if(i<=temp) {
                    str=str+'<div id='+i+' class="question">'+i+'</div>' ;

                    i++;
                }
                if(i<=temp){
                    str=str+'<div id='+i+' class="question">'+i+'</div>' ;

                    i++;
                }
                if(i<=temp){
                    str=str+'<div id='+i+' class="question">'+i+'</div>' ;

                    i++;
                }
                str=str+'</div>' ;


            }
        $('#ques-bar').append(str);

    }

    var secQues ='';
    var totSections=0;
    var answers=[];
    function changeSection(){
        if(currSec<totSections)
        {


            answers[currQues] = $('#typeMCQ input[name=choice]:checked').prop('className');

             for(i=1;i<=questions[currSec];i++){
                if(answers[i]!=undefined)
                {

                }
                else
                {

                    answers[i]=-1;



                }


             }
             $.post('evalMCQ.php/?section='+currSec+'&ques='+questions[currSec],{A:answers},function (data) {
                 
             });
            answers=[];

            fillBar(currSec+1);
            $('#area').remove();
            currSec++;
            currQues = 1;
            secQues =  $(DATA).filter('sec#'+currSec).prop('outerHTML');

            $('.question#1').click();

        }
        else{
            alert("Test Is Over !");
            window.location.href= 'index.php';

        }
    }
    $(function () {
        $('#start').css({"visibility":"collapse"});
        $('#sub-sec').on('click',function () {
            changeSection();
            $('#time-bar').html(time[currSec-1]);
            if(timer!=null){
                clearInterval(timer);

            }
            timer = setInterval(function () {

               var curr = $('#time-bar').html();
                if(curr<=0)
                {

                    $('#sub-sec').click();
                      return;
                }
                if(curr==5)
                {

                    alert('Time is about to end');
                }
                  $('#time-bar').html(curr-1);

            },1000*60);

        });

        $.post('get_questions.php', null, function (data) {
             
            if (data != 0) {
                DATA = data;
                $('#start').css({"visibility":"visible"});

                $('#start').click(function () {
                    $('#start').css({"visibility":"collapse"});

                    fillBar(1);
                    $('#notice').css({"visibility": 'collapse'});
                    $("#nav-bar").css({"visibility": "visible"});
                    $("#main").css({"visibility": "visible"});

                     toggleFullScreen();
                    currSec=1;
                    currQues=1;

                    $('#time-bar').html(time[currSec-1]);
                    timer = setInterval(function () {

                        var curr =    $('#time-bar').html();
                        if(curr<=0)
                        {

                            $('#sub-sec').click();
                            return;
                        }
                        if(curr==5)
                        {

                           alert('Time is about to end');
                        }
                        $('#time-bar').html(curr-1);

                    },1000*60);
                    secQues =  $(data).filter('sec#'+currSec).prop('outerHTML');
                    $('.question#1').click();
                });


                var name = $(data).filter('name').html();
                $('h2').html(name);
                var secs = $(data).filter('sections').html();
                totSections=secs;
                  questions = createArray(1,secs);
                  time = createArray(1,secs);

                for(i = 0;i<secs;i++){
                    questions[i]= $(data).filter('question#'+(i+1)).html();
                    time[i]= $(data).filter('time#'+(i+1)).html();

                }


                $(document).on('click','.question',function () {
                    answers[currQues] = $('#typeMCQ input[name=choice]:checked').prop('className');
                    $(this).css({"background-color":"#b6f271"});
                    $(this).hover(function () {
                        $(this).css({"background-color":"rgba(113, 110, 109, 0.2)"});
                    },function () {
                        $(this).css({"background-color":"#b6f271"});
                    });

                    var ques = $(this).prop('id');
                  var htm =  $(secQues).find('.a-'+ques);
                    $('.a-'+currQues).remove();
                    $('#main').append(htm);
                    currQues = ques;
                    if($('#typeCode').length != 0) {
                          editor = ace.edit("editor");
                         editor.getSession().setMode("ace/mode/c_cpp");
                    }
                    var $el = $('#area')
                    MathJax.Hub.Queue(['Typeset', MathJax.Hub, $el[0]]);


                });

                $(document).on('click','.custom-test',function () {
                    var input = '';
                    if($('#custom-input-head input').is(':checked')){
                        var code = editor.getValue();
                        input = $('#custom-input-text').val();
                        $.post('customTest.php',{input:input,section:currSec,question:currQues,code:code},function (data) {
                            $('#output-text').val('');
                           $('#output-text').val(data);
                        });

                    }else{

                    }

                });

                $(document).on('click','.submit-test',function () {
                    var code = editor.getValue();
                    $.post('codeRun.php',{totQues:questions[currSec],section:currSec,question:currQues,code:code},function (data) {
                        var d = new Date(); // for now

                        $('#output-text').val('Last Submission On : '+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());

                    });
                });

                $(document).on('click','#end-test',function () {
                    window.location.href="index.php";

                });

            }
            




        });
        

         

    })


</script>

</html>