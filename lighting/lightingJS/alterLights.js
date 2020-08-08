/* 
 *                     *
 * alter lights on/off *
 * scene selection and *
 * brightness          *
 *                     *
 */
   
   function roomOnOff(groupNum)
    {
        $.ajax({
            url:"/lighting/lightingPHP/groupOnOff.php", 
            data: { groupid: groupNum }, //SET PARAM1 TO GROUP ID
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
        });
    }

    function sceneSelect(groupNum, scene)
    {
        $.ajax({
            url:"/lighting/lightingPHP/sceneSelect.php", 
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
            url:"/lighting/lightingPHP/lighting-bri.php", 
            data: { groupid: groupNum, bri: brightness }, //SET PARAM1 TO GROUP ID param2 to sceneid
            type: "GET",
            context: document.body
        }).done(function(result) {
            //$("div").text(result);
        });
    }