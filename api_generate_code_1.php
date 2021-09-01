
<?php

//Intégration de l'api de génération du code 

//Voici un exemple en PHP qui illustre l'intégration 1



$url = "https://macsmspro.com/api/verification.php";


$fields = array(
    
    "name" => "xxx", // à remplacer par le nom de votre service
    "phone" => "xxxxxxxxx", // à remplacer par le numéro à vérifier
    "token" => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", // à remplacer par votre token 
    "codeLength"  => "6", // la taille du code (facultatif)
    "time" => "60", // durée d'expiration du code (facultatif) en seconde

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
