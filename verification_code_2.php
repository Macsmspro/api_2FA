<?php

$url = "https://macsmspro.com/api/verificationCheck.php";


$fields = array(
    
    "code" => "xxx", // à remplacer par le code à vérifier
    "phone" => "xxxxxxxx", // à remplacer par le numéro à vérifier
    "token" => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", // à remplacer par votre token 
    "verification_token"    => "VAxxxxxxxxxxxxxxxx" // token de vérification récupérer à l'étape 1

);



  $curl_options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query( $fields ),
    CURLOPT_HTTP_VERSION => 1.0,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false
  );

  $curl = curl_init();
  curl_setopt_array( $curl, $curl_options );
  $result = curl_exec( $curl );

  curl_close( $curl );



$response = json_decode($result);

echo "<pre>";
var_dump($response);
echo "</pre>";

?>
