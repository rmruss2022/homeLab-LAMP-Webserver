//function on load page - check or uncheck lightbulbs depending on state
document.addEventListener('DOMContentLoaded', function() {
    /**
     * determine if lights on or off
     */
    $.ajax({
        url:"/lighting/lightingPHP/isOn.php", 
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
        url:"/lighting/lightingPHP/isOn.php", 
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