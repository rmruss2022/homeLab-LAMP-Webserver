<?php


    $groupID = $_GET['groupid'];
    
        /*FIRST GET STATE OF GROUP*/
        $url = "http://192.168.6.21/api/r9qVoXN0guMC1zjwQFJKOB9wV7M3tZRrmw6Hdrcm/groups/" . $groupID . "/";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch,CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);	
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        //curl_setopt($ch, CURLOPT_POSTFIELDS,$groupAttributes);			
        //usleep(250000); 
        $result = curl_exec($ch);
        /** if error print it */ 
        //$result = (String) $result;
        if ($result == false) {
            //echo "false";
            //echo curl_errno($ch);
            //echo curl_error($ch);
            return curl_error($ch);
        } 
        /**otherwise get on state of group */
        else {
            $len = strlen($result);
            
            
            $rArr = array();
            $tempArr = "";
            $tempChar;
            
            
            

            for ($x = 0; $x < $len; $x++)
            {
                $tempChar = $result[$x];
                if ($tempChar == "," || $tempChar == ":")
                {

                    array_push($rArr, $tempArr);
                    $tempArr = "";
                }
                else if ($tempChar != '"' && $tempChar != "{" && $tempChar != "}" && $tempChar != "[" && $tempChar != "]")
                {
                    $tempArr .= $tempChar;
                }
            }
            //14th pos tells if any lights are on in group
            $anyOn = $rArr[14];
            echo $anyOn; 

        }



?>