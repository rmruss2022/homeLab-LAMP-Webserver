<!DOCTYPE html>
<html>
<head>
    <!-- scaling format -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ajax jquery google api -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- css links -->
    <link rel="stylesheet" href="lightingCSS/lightBulbStyle.css">
    <link rel="stylesheet" href="lightingCSS/menuOverlayStyle.css">
    <link rel="stylesheet" href="lightingCSS/containerLayoutStyle.css">
    <link rel="stylesheet" href="lightingCSS/sliderStyle.css">
    <link rel="stylesheet" href="lightingCSS/btnGroupStyle.css">
    <link rel="stylesheet" href="lightingCSS/lockStyle.css">
    <!-- javascript links --> 
    <script src="lightingJS/loadLights.js"></script>
    <script src="lightingJS/alterLights.js"></script>
    <script src="lightingJS/menuOpenClose.js"></script>
    <script src="lightingJS/goTo.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <!-- overlay matthews room menu html -->
    <div class="overlay" id="overlayRM2">
        <div class="overlay-content">
        <div class="closebtn" onclick="offRM2()">&times;</div>
            <p class="pitem" onclick="sceneSelect('2', '9zblnxcA1LarH5z')">Tropical Twilight</p>
            <p class="pitem" onclick="sceneSelect('2', 'dy7jRvkg8QzM9w3')">Forest</p>
            <p class="pitem" onclick="sceneSelect('2', 'l9XUSC9s7CEWAjD')">LAX</p>
            <p class="pitem" onclick="sceneSelect('2', 'yhJU1rEln66xYMi')">Relax</p>
            <p class="pitem" onclick="sceneSelect('2', 'vjA9EykZzId0AtV')">Green</p>
            <p class="pitem" onclick="sceneSelect('2', 'Ii5gK2HlW-3JXIA')">Energize</p>
        </div>
    </div>

    <!-- overlay dinning menu html -->
    <div class="overlay" id="overlayRM1">
        <div class="overlay-content">
        <div class="closebtn" onclick="offRM1()">&times;</div>
            <p class="pitem" onclick="sceneSelect('1', 'BdQf7gVDQIFaK-m')">Bright</p>
            <p class="pitem" onclick="sceneSelect('1', 'z405tT3mxLLws7l')">Normal</p>
            <p class="pitem" onclick="sceneSelect('1', 'rMi7yYedx0hupto')">Dimmed</p>
        </div>
    </div>

    <div class="toggle">
        <button class="btn" id="btnLighting" onclick="goToLighting(this)"><i class="fa fa-lightbulb-o"></i></button>
        <button class="btn" id="btnTherm" onclick="goToThermostat()"><i class="fa fa-thermometer-half"></i></button>
        
    </div>

    <!-- grid container html -->
    <div class="grid-container">
        
            <div class="item">

                <p class="headings">Dinning Room</p>
                <input class="l" type="checkbox" id="dinningRoomCB" onclick="roomOnOff('1')">
                <div class="slidecontainer">
                    <input type="range" min="0" max="254" value="127" class="slider" id="myRangeDinning">
                    <div class="openMenuCircle" onclick="onRM1()"></div>
                </div>

            </div>            

            <div class="item">

                <p class="headings">Matthew's Room</p>
                <input class="l" type="checkbox" id="matthewsBedroomCB" onclick="roomOnOff('2')">
                <div class="slidecontainer">
                    <input type="range" min="0" max="254" value="127" class="slider" id="myRangeMatthew">
                    <div class="openMenuCircle" onclick="onRM2()"></div>
                </div>

            </div>  

            <div class="item">
                <p class="headings">Bedroom A</p>
                <input class="l" type="checkbox" onclick="test()">
                <div class="slidecontainer">
                    <input type="range" min="0" max="254" value="127" class="slider" id="myRangeMatthew">
                    <div class="openMenuCircle" onclick="onRM2()"></div>
                </div>
            </div>

            <div class="item">
                <p class="headings">Bedroom B</p>
                <input class="l" type="checkbox" onclick="test()">
                <div class="slidecontainer">
                    <input type="range" min="0" max="254" value="127" class="slider" id="myRangeMatthew">
                    <div class="openMenuCircle" onclick="onRM2()"></div>
                </div>
            </div>

            <div class="item">
                <p class="headings">Bedroom A</p>
                <input class="l" type="checkbox" onclick="test()">
                <div class="slidecontainer">
                    <input type="range" min="0" max="254" value="127" class="slider" id="myRangeMatthew">
                    <div class="openMenuCircle" onclick="onRM2()"></div>
                </div>
            </div>

            <div class="item">
                <p class="headings">Bedroom B</p>
                <input class="l" type="checkbox" onclick="test()">
                <div class="slidecontainer">
                    <input type="range" min="0" max="254" value="127" class="slider" id="myRangeMatthew">
                    <div class="openMenuCircle" onclick="onRM2()"></div>
                </div>
            </div>
            
        </div>

    </div>

    <div class="lockContainer" onclick="lockClick()">
        <div class="lock" >
            <div class="unlocker"></div>
        </div>
    </div>

<!-- get slider value and call setBri function 
    in alterLights.js -->
<script>

    function lockClick() {
        $('.unlocker').toggleClass('.unlockAnimation');
    }

    function goToThermostat() {
        document.getElementById("btnTherm").style.backgroundColor="rgb(193, 240, 255)";
        document.getElementById("btnLighting").style.backgroundColor="white";
        window.location='http://192.168.6.35/thermostat/thermostat.php'
    }

    function goToLighting() {
        document.getElementById("btnTherm").style.backgroundColor="white";
        document.getElementById("btnLighting").style.backgroundColor="rgb(193, 240, 255)";
    }

    var sliderMatthew = document.getElementById("myRangeMatthew");
    var sliderDinning = document.getElementById("myRangeDinning");
        
    sliderMatthew.oninput = function() {
        var brightness = this.value;
        setBri(2, brightness);
    }

    sliderDinning.oninput = function() {       
        var brightness = this.value;
        setBri(1, brightness);
    }  

    /**
     * determine brightess
     */
    //matthews bedroom
    $.ajax({
        url:"/lighting/lightingPHP/getBri.php", 
        data: { groupid: "8" }, //matthews room check bri
        type: "GET",
        context: document.body
    }).done(function(result) {
        sliderMatthew.value = result;
    });
    //dinning room
    $.ajax({
        url:"/lighting/lightingPHP/getBri.php", 
        data: { groupid: "4" }, //matthews room check bri
        type: "GET",
        context: document.body
    }).done(function(result) {
        sliderDinning.value = result;
    });

</script>
   
</body>

</html> 
