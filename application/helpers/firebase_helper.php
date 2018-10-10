<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
//Define Fcm class
class Firebase {
    //Define SendNotification function
    function sendNotification($dataArr) {
        $fcmApiKey = 'AAAAiH0DKVY:APA91bHfSxy3P6vsd0Et5dLlX0FokcQ0vlK5z_bHtmh-ZLP4Mkm6U9xnNCFLkLMi56LtBzzBqHZu85GfJshBhw4QWBr7cCigm51krXDpiN5ypdv5NpcY1KihRDzybJntDbypnjLfeClC3v4or7zw0VVLcZY0ZaaOjQ';//App API Key(This is google cloud messaging api key not web api key)
        $url = 'https://fcm.googleapis.com/fcm/send';//Google URL

        $registrationIds = $dataArr['device_id'];//Fcm Device ids array

        $message = $dataArr['message'];//Message which you want to send
        $title = $dataArr['title'];

        
        $headers = array(
            'Authorization: key=' . $fcmApiKey,
            'Content-Type: application/json'
        );

        $notification = array('text' => $message,'title' => $title);

        $fields  = array(
            'registration_ids'=> $registrationIds,
            'priority'=> "high",
            'notification'  => $notification,
         );
 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        // Execute post
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);    
 
        return $result;
    }
}

/* End of file phpass_helper.php */
/* Location: ./application/helpers/phpass_helper.php */