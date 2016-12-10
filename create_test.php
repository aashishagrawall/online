<?php session_start();
 
if (!isset($_SESSION['cid']) || !isset($_SESSION['tid'])) {
    die();
}


?>
<!DOCTYPE html>


<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="https://cdnjs.com/libraries/normalize" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="jquery-3.1.1.js"></script>

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
            width: 250px;
            min-height: 700px;
            background-color: white;

        }

        .bar-item {
            font-family: "Roboto";
            display: flex;
            padding: 5px;
            margin: 5px;
            width: 90%;
            text-align: justify;
            opacity: .2;

        }

        .bar-item:hover {

            border-radius: 5px;
        }

        #area {
            background-color: white;
            margin-left: 30px;
            margin-right: 100px;
            width: 100%;
            border-left: 1px solid #cfcfcf;
            border-right: 1px solid #cfcfcf;
            display: flex;
            flex-direction: column;
            min-height: 700px;
        }

        #sectionNum, #setTime {
            margin-left: 20px;
            margin-right: 20px;

            padding-top: 10px;
            padding-bottom: 10px;
            width: 100%;
        }

        #questionBox {
            margin: 20px 30px 20px 30px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 20px;
            padding-bottom: 20px;
            border: 1px solid #cfcfcf;
            display: flex;
            flex-direction: column;
        }

        #questionNum {
            padding: 5px;
        }

        #questionArea {
            width: 90%;
            height: auto;
        }

        #constraints, #sampleInput, #sampleOutput {
            width: 30%;

        }

        .mcqOption {
            padding: 5px;
        }
    </style>
</head>
<html>
<div id="nav-bar">
    <div id="nav-bar-logo">
        <img src="logo-2-small.png" height="50px">
    </div>
    <ul dir="ltr" id="nav-bar-list">
        <li id="list-item">Organization: <?php echo $_SESSION['name']; ?>&nbsp;</li>
        <li id="list-item">Test: <?php echo $_SESSION['testName']; ?>&nbsp;</li>

        <li id="list-item">Account Home</li>

    </ul>


</div>
<div id="main" style="display: flex;flex-direction: row">
    <div id="side-bar">
        <div id="dummy2" style="position: fixed">
            <div id="add-section" class="bar-item">Add Section</div>
            <div id="end-section" class="bar-item">Submit Section</div>
            <div id="add-mcq" class="bar-item">Add MCQ Question</div>
            <div id="add-code" class="bar-item">Add Coding Question</div>
            <div id="upload" class="bar-item">Back</div>
        </div>
    </div>

    <div id="area">
        <div id="sectionNum" style="visibility: hidden"></div>
        <div id="setTime" style="visibility: hidden">Time : <input type="number" name="time"> Minutes</div>
        <div id="dummy">

        </div>

    </div>


</div>


<script>
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
    var mcqArea, codeArea;
    var mcqQ, codeQ;
    var addSec = true;
    var endSec = false;
    var addmcq = false;
    var addcode = false;
    var upload = true;
    var totQues;
    var addsecButton = 0;
    var subsecButton = 0;
    var questions = 0;

    function changeOpacity(elem, opa) {
        $(elem).css({"opacity": opa});
    }
    function turnArea(ques) {
        var time = $('input[name=time]').val();
        if (time == '') {
            alert("Time cannot be zero");
            return;
        }
        var codeQues = 0;
        var answerData = '';
        var questionData = '';
        var IO='';
        for (i = 0; i < ques; i++) {

            var $box = $(".q-" + (i + 1));
            if ($box.hasClass('MCQ')) {
                var o1, o2, o3, o4, o5, q;
                o1 = $box.find('input[name=o1]').val();
                o2 = $box.find("input[name=o2]").val();
                o3 = $box.find("input[name=o3]").val();
                o4 = $box.find("input[name=o4]").val();
                o5 = $box.find("input[name=o5]").val();
                q = $box.find('textarea').val();
                var temp = $.parseHTML(mcqArea);
                $(temp).find("#MCQ").html(q);
                $(temp).find("#typeMCQ").addClass('q-' + (i + 1));
                $(temp).filter('#area').addClass('a-' + (i + 1));

                $(temp).find("#question-no").html("Question " + (i + 1));
                $(temp).find('span#1').html(o1);
                $(temp).find('span#2').html(o2);
                $(temp).find('span#3').html(o3);
                $(temp).find('span#4').html(o4);
                questionData += $(temp).prop('outerHTML');
                answerData += o5 + '#';

            } else {
                answerData += -1 + '#';
                codeQues++;
                var q, constraints, input, output;
                q = $box.find('textarea#questionArea').val();
                constraints = $box.find('textarea#constraints').val();
                input = $box.find('textarea#sampleInput').val();
                output = $box.find('textarea#sampleOutput').val();
                var temp = $.parseHTML(codeArea);
                $(temp).find("#typeCode").addClass('q-' + (i + 1));
                $(temp).filter("#area").addClass('a-' + (i + 1));
                $(temp).find("#question-no").html("Question " + (i + 1));

                $(temp).find("#code-question").html(q);
                $(temp).find("#constraints").html(constraints);
                $(temp).find("#code-question").html(q);
                $(temp).find("#constraints").html(constraints);
                $(temp).find("#i-o #input code").html(input);
                $(temp).find("#i-o #output code").html(output);

                questionData += $(temp).prop('outerHTML');
                IO += (i + 1) + '#';
                for (j = 0; j < 5; j++) {
                    IO += $box.find('textarea.i-' + j).val() + '#';
                    IO += $box.find('textarea.o-' + j).val() + '#';

                }


            }

        }
        var t = time;
        succ = 0;
        $.post('saveQuestion.php', {
            section: subsecButton + 1,
            questions: ques,
            quesData: questionData,
            time: t
        }, function (data) {
            if (data == 1) {
                succ++;
            }
        });
        $.post('saveAnswer.php', {section: subsecButton + 1, questions: ques, ansData: answerData}, function (data) {
            if (data == 1) {
                succ++;
            }

        });
        $.post('codeIOSave.php', {section: subsecButton + 1, questions: codeQues, IO: IO}, function (data) {
            if (data == 1) {
                succ++;
            }

        });
        return true;
    }

    $(function () {

        $('#add-section').css({"opacity": "1"});
        $('#upload').css({"opacity": "1"});

        $("#add-section").hover(function () {

            if (addSec) {
                $(this).css({"background-color": "#cfcfcf", "cursor": "pointer"});
            }
        }, function () {
            $(this).css({"background-color": "#ffffff"});
        });
        $("#end-section").hover(function () {
            if (endSec) {
                $(this).css({"background-color": "#cfcfcf", "cursor": "pointer"});

            }
        }, function () {
            $(this).css({"background-color": "#ffffff"});
        });
        $("#add-mcq").hover(function () {
            if (addmcq) {
                $(this).css({"background-color": "#cfcfcf", "cursor": "pointer"});

            }
        }, function () {
            $(this).css({"background-color": "#ffffff"});
        });
        $("#add-code").hover(function () {
            if (addcode) {
                $(this).css({"background-color": "#cfcfcf", "cursor": "pointer"});

            }
        }, function () {
            $(this).css({"background-color": "#ffffff"});
        });
        $("#upload").hover(function () {
            if (upload) {
                $(this).css({"background-color": "#cfcfcf", "cursor": "pointer"});

            }
        }, function () {
            $(this).css({"background-color": "#ffffff"});
        });


    });
    $(function () {
        $.post('mcqQuestion.php', null, function (data) {
            mcqQ = data;
        });
        $.post('codeQuestion.php', null, function (data) {
            codeQ = data;
        });
        $.post('MCQArea.php', null, function (data) {
            mcqArea = data;
        });
        $.post('codeArea.php', null, function (data) {
            codeArea = data;
        });
        $("#add-section").click(function () {
            if (addSec) {
                $("#sectionNum").css({"visibility": "visible"});
                $("#setTime").css({"visibility": "visible"});
                $("#sectionNum").html("Section : " + (subsecButton + 1));
                addSec = false;
                $(".bar-item").css({'opacity': '1'});
                $('#add-section').css({'opacity': '.2'});
                endSec = addcode = addmcq = upload = true;

            }
        });

        $("#add-mcq").click(function () {

            if (addmcq) {
                var mcq = $.parseHTML(mcqQ);
                $(mcq).addClass("MCQ q-" + (questions + 1));

                $(mcq).find('#questionNum').html('Question : ' + (questions + 1));
                $("#area #dummy").append(mcq);

                questions = questions + 1;
            }
        });
        $("#add-code").click(function () {

            if (addcode) {
                var code = $.parseHTML(codeQ);
                $(code).addClass("CODE q-" + (questions + 1));
                $(code).find('#questionNum').html('Question : ' + (questions + 1));
                $("#area #dummy").append(code);
                questions = questions + 1;
            }
        });

        $('#end-section').click(function () {
            if (endSec) {
                if (questions > 0) {
                    if (!turnArea(questions)) {
                        alert('Section not uploaded.Press Submit Section Again.');
                        return;
                    }
                    subsecButton++;

                }
                $("#sectionNum").css({"visibility": "hidden"});
                $("#setTime").css({"visibility": "hidden"});
                 questions = 0;
                $("#area").find("#dummy").html('');
                $(".bar-item").css({'opacity': '.2'});
                $('#add-section,#upload').css({'opacity': '1'});
                endSec = addcode = addmcq = false;
                addSec = true;

            }
        });

        $('#upload').click(function () {
            if (questions > 0) {
                window.onbeforeunload = function () {
                    return "Some Questions remain to be uploaded.First press End Section Button.";
                };
            }
            window.location.href = 'account_home.php';


        });


    });


</script>
</html>