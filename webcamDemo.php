<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <script src="webcamJS/webcam.js"></script>

</head>
<html>
<body>
<div id="my_camera" style="width:320px; height:240px;"></div>
<div id="my_result"></div>

<script language="JavaScript">
    Webcam.attach( '#my_camera');

    function take_snapshot() {
        Webcam.snap( function(data_uri) {

             document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

<a href="javascript:void(take_snapshot())">Take Snapshot</a>


</body>
</html>