<?php
// author: Kelsey De Los Reyes Andrews
// date: 16/08/2023
// run the autoload.php file that is in the vendor file and contains the google oauth dependancies
require_once__DIR__.'/oauth-files/vendor/autoloader.php';

session_start();
//create a new google client instance
$client = new Google\Client();
// configure the client with the details provided in the Google OAuth client JSON file
$client->setAuthConfigFile('client_secret.json');
// set the redirect url
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
// add a scope for authorising the app with info on the google oauth
$client->sddScope("https://www.googleapis.com/auth/userinfo.email");

// if the user isn't authorised to use the app
if (! isset($_GET['code'])) {
    //send the user to the google sign in page
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    // otherwise get the user sign in information and redirect them to the index.php page
    $client->authenticate($_GET['code']);
    $_SERVER['access_token'] = $client->getAccessToken();
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
?>