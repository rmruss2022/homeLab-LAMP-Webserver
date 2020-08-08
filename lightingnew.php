<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">








<style>

.grid-container {
  display: grid;
  grid-template-columns: auto auto;
  grid-gap: 10px;
  
  padding: 10px;    
}

.grid-container > div {
  /***background-color: rgb(193, 240, 255);*/
  background-color: #ceeaed;
  border-style:solid;
  border-width: 0.02em;
  border-color: gray;
  border-radius: .5em;
  text-align: center;
  padding: .2em;
  padding-top: 0;
  padding-bottom: .15em;
}

.circlerow {
  display: grid;
  grid-template-columns: 44% 45% 0%;
  grid-gap: 0;
  
  padding: .1em;
  padding-top: .15em;
  padding-bottom: 0; 
  border-style: solid;
  border-width: 0em;   
}

.circlerow > div {
  /***background-color: rgb(193, 240, 255);*/
  display: flex;
  height: .2em;
  width: .2em;
  border-style:solid;
  border-width: 0.02em;
  border-color: gray;
  border-radius: 50%;
  text-align: center;
  padding: .2em;
}


</style>


<script type="text/javascript">

    //function on load page - check or uncheck lightbulbs depending on state
    document.addEventListener('DOMContentLoaded', function() {
        
        $.ajax({
            url:"isOn.php", 
            data: { groupid: "1" }, //SET PARAM1 TO GROUP ID
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
            if (result == "true")
            {
                document.getElementById("dinningRoomCB").checked = true;
            }
        });

        $.ajax({
            url:"isOn.php", 
            data: { groupid: "2" }, //SET PARAM1 TO GROUP ID
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
            if (result == "true")
            {
                document.getElementById("matthewsBedroomCB").checked = true;
            }
        });
        


    }, false);
    
    function dinningRoomOnOff()
    {
        $.ajax({
            url:"groupOnOff.php", 
            data: { groupid: "1" }, //SET PARAM1 TO GROUP ID
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
        });
    }

    function matthewBedroomOnOff()
    {
        $.ajax({
            url:"groupOnOff.php", 
            data: { groupid: "2" }, //SET PARAM1 TO GROUP ID
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
        });
    }

    function sceneSelect(groupNum, scene)
    {
        $.ajax({
            url:"sceneSelect.php", 
            data: { groupid: groupNum, sceneid: scene }, //SET PARAM1 TO GROUP ID param2 to sceneid
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
        });
    }

    function setBri(groupNum, brightness)
    {
        $.ajax({
            url:"lighting.php", 
            data: { groupid: groupNum, bri: brightness }, //SET PARAM1 TO GROUP ID param2 to sceneid
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
        });
    }


</script>



<style>
    *, *:before, *:after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
:root {
    /* minFontSize + (maxFontSize - minFontSize) * (100vw - minVWidth)/(maxVWidth - minVWidth) */
    font-size: calc(64px + (80 - 64) * (300vw - 320px)/(960 - 320));
}
body, input {
    font-size: 1em;
    line-height: 2.5;
    /* change margin height*/
    margin-top: 0em;
}
body {
    background: #e0e0e0;
}
input {
    display: block;
    margin-bottom: 1.5em;
}
main {
    padding: 10em 10em 10em 10em;
    text-align: center; 
}
.l {
    background-color: rgba(0,0,0,0.7);
    border-radius: 0.75em;
    box-shadow: 0.125em 0.125em 0 0.125em rgba(0,0,0,0.3) inset;
    color: #fdea7b;
    display: inline-flex;
    align-items: center;
    margin: auto;
    padding: 0.15em;
    width: 3em;
    height: 1.5em;
    transition: background-color 0.1s 0.3s ease-out, box-shadow 0.1s 0.3s ease-out;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    
}
.l:before, .l:after {
    content: "";
    display: block;
}
.l:before {
    background-color: #d7d7d7;
    border-radius: 50%;
    width: 1.2em;
    height: 1.2em;
    transition: background-color 0.1s 0.3s ease-out, transform 0.3s ease-out;
    z-index: 1;
}
.l:after {
    background:
        linear-gradient(transparent 50%, rgba(0,0,0,0.15) 0) 0 50% / 50% 100%,
        repeating-linear-gradient(90deg,#bbb 0,#bbb,#bbb 20%,#999 20%,#999 40%) 0 50% / 50% 100%,
        radial-gradient(circle at 50% 50%,#888 25%, transparent 26%);
    background-repeat: no-repeat;
    border: 0.25em solid transparent;
    border-left: 0.4em solid #d8d8d8;
    border-right: 0 solid transparent;
    transition: border-left-color 0.1s 0.3s ease-out, transform 0.3s ease-out;
    transform: translateX(-22.5%);
    transform-origin: 25% 50%;
    width: 1.2em;
    height: 1em;
}
/* Checked */
.l:checked {
    background-color: rgba(0,0,0,0.45);
    box-shadow: 0.125em 0.125em 0 0.125em rgba(0,0,0,0.1) inset;
}
.l:checked:before {
    background-color: currentColor;
    transform: translateX(125%)
}
.l:checked:after {
    border-left-color: currentColor;
    transform: translateX(-2.5%) rotateY(180deg);
}
/* Other States */
.l:focus {
    /* Usually an anti-A11Y practice but set to remove an annoyance just for this demo */
    outline: 0;
}

.divtxt {
    font-size: 0.5em;
}
</style>


<style>
/*SLIDER CSS*/
    .headings {
        font-size: .35em;
        font-family: 'Courier New', Courier, monospace;
        padding-top: 0em;
    }

    #bright {
        background-color: #ffe817;
    }
    #normal {
        background-color: #fff280;
    }
    #dim {
        background-color: #edead1;
    }

    #forest {
        background-color: #aee082;
    }
    #tropical {
        background-color: #ab7dd4;
    }

</style>

<style>
input[type="range"] {
    margin: 0px;
}


.slidecontainer {
    display: grid;
  grid-template-columns: auto auto;
  grid-template-columns: 80% 20%;
  margin-top: .2em;
  margin-bottom: 0px;
  padding-bottom: .2em;
  border-style: solid;
  border-width: 0em;
}

.slider {
    display: block;
  margin-right: auto;
  margin-left: auto;
  -webkit-appearance: none;
  border-radius: 25px;
  width: 100%;
  height: .3em;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  border-radius: 100%;
  -webkit-appearance: none;
  appearance: none;
  width: .4em;
  height: .4em;
  background: #fdea7b;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}



<style>
/* The Overlay (background) */
.overlay {
  /* Height & width depends on how you want to reveal the overlay (see JS below) */   
  height: 100%;
  width: 0;
  position: fixed; /* Stay in place */
  z-index: 10; /* Sit on top */
  left: 0;
  top: 0;
  background-color: rgb(0,0,0); /* Black fallback color */
  background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
  overflow-x: hidden; /* Disable horizontal scroll */
  transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
  position: relative;
  top: 25%; /* 25% from the top */
  width: 100%; /* 100% width */
  text-align: center; /* Centered text/links */
  margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
}

/* The navigation links inside the overlay */
.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block; /* Display block instead of inline */
  transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
  position: relative;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}

</style>











<style>
/*tyle of menu*/
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 10;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: relative;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}

#menuCircle {
    height: .3em;
    width: .3em;
    border-radius: 50%;
    background-color: blue;
    margin-left: 10px;
}


</style>
</head>
<body>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>
</div>




<div class="grid-container">
    
    
    
        <div class="item">

            <p class="headings">Dinning Room</p>

            <input class="l" type="checkbox" id="dinningRoomCB" onclick="dinningRoomOnOff()">

            <div class="circleRow">
                <div class="circleItem" id="bright" onclick="sceneSelect('1', 'BdQf7gVDQIFaK-m')"></div>
                <div class="circleItem" id="normal" onclick="sceneSelect('1', 'z405tT3mxLLws7l')"></div>
                <div class="circleItem" id="dim" onclick="sceneSelect('1', 'rMi7yYedx0hupto')"></div>

            </div>

        </div>            

        <div class="item">

            <p class="headings">Matthew's Room</p>
            <input class="l" type="checkbox" id="matthewsBedroomCB" onclick="matthewBedroomOnOff()">
           

            <div class="slidecontainer">
                <input type="range" min="0" max="254" value="127" class="slider" id="myRange">

                <div id="menuCircle" onclick="openNav()"></div>

            </div>

        </div>  

        <div class="item">
            <p class="headings">Bedroom A</p>
            <input class="l" type="checkbox" onclick="test()">
        </div>

        <div class="item">
            <p class="headings">Bedroom B</p>
            <input class="l" type="checkbox" onclick="test()">
        </div>
        
    </div>


    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        //output.innerHTML = slider.value;

        slider.oninput = function() {
            
            var brightness = this.value;
            setBri(2, brightness);
        }

    

    </script>








<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
     
</body>
</html>
