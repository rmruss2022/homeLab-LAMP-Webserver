<!DOCTYPE html>
<html>
<head>
    <!-- css links -->
    <link rel="stylesheet" href="btnGroup.css">
    <link rel="stylesheet" href="thermostat.css">
    <link rel="stylesheet" href="containerLayoutStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="thermostat.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.js"></script>

</head>


<body>

    <div class="toggle">
        <button class="btn" id="btnLighting" onclick='window.location="http://192.168.6.35/lighting/lighting.php"'><i class="fa  fa-arrow-left"></i></button>
    </div>

    <div class="grid-container">
        
        <div class="item">

          <p>Second Floor Temp</p> 

          <input type="range" id="myRange">

          <button class="setButton" onclick="setTemp()">Set</button>
        
        </div>
        
    </div>



<script>

  //function on load page - check or uncheck lightbulbs depending on state
document.addEventListener('DOMContentLoaded', function() {
    /**
     * determine if lights on or off
     */
    $.ajax({
        url: "http://192.168.6.37:5000/secFloorTempRT", 
        type: "GET",
        context: document.body
    }).done(function(result) {
        var intResult = Math.round( result );
        console.log(intResult);
        
        $('#myRange').roundSlider('setValue', intResult);
    });



}, false);



function setTemp() {
  var sliderTemp = document.getElementById("myRange");
  var temp = sliderTemp.value;
  temp = temp.toString();
  console.log(temp);
  $.ajax({
        url: "http://192.168.6.37:5000/secFloorTemp", 
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify({"temperature" : temp }),
        context: document.body
    }).done(function(result) {
        var intResult = Math.round( result );
        console.log(intResult);
        $('#myRange').roundSlider('setValue', intResult);
    });

}


    // you need to bind `.roundSlider()` with the `id = 'myRange'`.
    $("#myRange").roundSlider({
        sliderType: "min-range",
        circleShape: "half-top",
        handleShape: "round",
        width: 50, // width of the roundSlider
        radius: 250, // radius size
        value: 72,
        max: 78,
        min: 65
    });

 
</script>

</body>


