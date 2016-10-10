 <?php
 
    $ch = curl_init("https://fcm.googleapis.com/fcm/send");

    //The device token.
    $token = ""; //token here

    //Title of the Notification.
    $title = "Title Notification";

    //Body of the Notification.
    $body = "This is the body show Notification";

    //Creating the notification array.
    $notification = array('title' =>$title , 'text' => $body);

    //This array contains, the token and the notification. The 'to' attribute stores the token.
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');

    //Generating JSON encoded string form the above array.
    $json = json_encode($arrayToSend);
    //Setup headers:
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key= XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; // key here

    //Setup curl, add headers and post parameters.
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       

    //Send the request
    $response = curl_exec($ch);

    //Close request
    curl_close($ch);
    return $response;
    
?>
