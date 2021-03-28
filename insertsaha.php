<?php
include('db/db.php');
if (isset($_POST["operation"])) {


    if ($_POST["operation"] == "Add") {
        $statement = $connection->prepare("
			INSERT INTO audit (code , firstname , Lastname,Amount,Balance,Track,Fname ) 
			VALUES (:code, :firstname, :Lastname, :Amount, :Balance, :Track, :Fname)
		");
        $result = $statement->execute(
            array(
                ':code'    =>    $_POST["code"],
                ':firstname'    =>    $_POST["firstname"],
                ':Lastname'    =>    $_POST["Lastname"],
                ':Amount'    =>    $_POST["Amount"],
                ':Balance'    =>    $_POST["Balance"],
                ':Track'    =>    $_POST["Track"],
                ':Fname'    =>    $_POST["Fname"],
            )
        );
        if (!empty($result)) {
            echo 'Data Inserted';
        }
                    
		define('LINE_API',"https://notify-api.line.me/api/notify");
 
        $token = "am8RpKXksYOQWwKuaI11OaJOiZPGNt9jrelpuANG9l7"; 
        $str = $_POST["code"];
        $res = notify_message($str,$token);
        function notify_message($message,$token){
         $queryData = array('message' => $message);
         $queryData = http_build_query($queryData,'','&');
         $headerOptions = array( 
                 'http'=>array(
                    'method'=>'POST',
                    'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                              ."Authorization: Bearer ".$token."\r\n"
                              ."Content-Length: ".strlen($queryData)."\r\n",
                    'content' => $queryData
                 ),
         );
         $context = stream_context_create($headerOptions);
         $result = file_get_contents(LINE_API,FALSE,$context);
         $res = json_decode($result);
         return $res;
        }
    }

    if ($_POST["operation"] == "Edit") {

        $statement = $connection->prepare(
            "UPDATE audit 
			SET code = :code, firstname = :firstname, Lastname = :Lastname,  Amount = :Amount  ,  Balance = :Balance, Track = :Track,
            Fname = :Fname
			WHERE Id = :Id
			"
        );
        $result = $statement->execute(
            array(
                ':code'    =>    $_POST["code"],
                ':firstname'    =>    $_POST["firstname"],
                ':Lastname'    =>    $_POST["Lastname"],
                ':Amount'    =>    $_POST["Amount"],
                ':Balance'    =>    $_POST["Balance"],
                ':Track'    =>    $_POST["Track"],
                ':Fname'    =>    $_POST["Fname"],
                ':Id'            =>    $_POST["user_id"]
            )
        );
        if (!empty($result)) {
            echo 'Data Updated';
        }
    }
}
