<?php
require_once("twitter/twitteroauth.php"); //Path to twitteroauth library

$datos = file_get_contents("php://input");
$request = json_decode($datos);// se reciven los datos enviados por el metodo http por metodo POST
$usuario = $request->usuario;
$password = $request->password;

$user = "FutApp";//usuario que se buscara en twitter
$number = 5;//number de twitts que regresara get
$consumerkey = "s1FxRAoUl5RuAI2TcWq7OSOJr";//"LHkKJItKmJGj9EewF2543SQoY"; llabes de twitter de la aplicacion creada
$consumersecret = "UTpLe4SM3m497RuQ8tZbRVjvL3oobnoEPHuPRMSxr9W9LqwKx8";//"cVImsvPmHZxrLte2JgCtUqx1JgNJApMvd4RzS99UgFVRB0V4C8";
$accesstoken = "2220559730-ukrZ72qzvKNkxgqFaiCmIOhrKqu9bJikqDej10F";//"379872175-t4gLqlkgZ5wdP5d3A3AujfRwc8ZMU7Oq3yn9ptZ5";
$accesstokensecret = "QC9zz2WCawWdYl1yGCH3ECZCoprqGctpj3HP1fix3lOfA";//"SR7GqQOoBJWVS6qmHMIU8iDCjwylgAHHvDVlHWIZ9leno";
 
function getAccessToken($key, $secret, $token, $token_secret) {//funcion para crear la conexion con twitter
  $connection = new TwitterOAuth($key, $secret, $token, $token_secret);
  return $connection;
}
  
$connection = getAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 // conectando con twitter
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$user."&count=".$number);
 
echo json_encode($tweets);// regresamos los tweets en formato json
?>
