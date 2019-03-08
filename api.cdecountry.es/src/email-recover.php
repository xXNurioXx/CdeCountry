<?php

// DEBUG MODE REMOVE!!!
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection
require_once $_SERVER['DOCUMENT_ROOT'].'/src/database.php';

// Set the content type
header('Content-Type: application/json');

// Parse JSON request
if(!(isset($_POST['json']))) die( json_encode( array( "error" => "invalid_request_type") ) );
$request = json_decode( $_POST['json'] , true );

// Request params validation
if( !(isset($request['identity']) ) die( json_encode( array( "error" => "invalid_request_params") ) );

// The SQL query
$prepare = $nlsql->getPDO()->prepare("SELECT `id`, `email`, `password`, `pass_salt` FROM `ciudadanos` WHERE `email`=:identificator OR `id` = :identificator");
$prepare->bindParam(":identificator", $request['identity'], PDO::PARAM_STR, 400);
$prepare->execute();

// If the profile don't exist's response with error message
if($prepare->rowCount() == 0) die( json_encode( array( "error" => "authentification_error", "requested-profile" => $request['identity'], "message" => "No se encontró la cuenta." ) ) );

// Obtain user information from database
$userdata = $prepare->fetch(PDO::FETCH_ASSOC);

// Create user password hash 
$hashedCredential = hash('sha256', $userdata['pass_salt'] . hash('sha256', $request['password'] . md5($userdata['pass_salt'])) . $userdata['pass_salt']);

// Validate user password hashes
if($hashedCredential != $userdata['password']) die( json_encode( array( "error" => "authentification_error", "message" => "La contraseña no es valida." ) ) );

// Create new session variables
$session = [];
$session['expire'] = microtime(true) + (1000*60*60*24);
$session['identity'] = $userdata['id'];
$session['ip'] = $_SERVER['REMOTE_ADDR'];
$session['token'] = md5($session['identity'] + $session['ip'] + microtime(true));

// Print the response
print( json_encode( array( "token" => $session['token'], "expire" => $session['expire'], "identity" => $session['identity'] ) ) );

?>