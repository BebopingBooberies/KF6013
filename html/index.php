<?php
// author: Kelsey De Los Reyes Andrews
//date: 16/03/2023
//
require_once__DIR__.'/oauth-files/vendor/autoloader.php';

session_start() ;
//create a new instance of google client
$client = new Google\Client();
//configure the client with the details provided in the Google OAuth client JSON file
$client->setAuthConfig('client_secret.json');
$client->addScope("https://googleapis.com/auth/userinfo.email");

//check to see if there is an access token
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    //set the Google OAuth client access token
    $client->setAccessToken($_SESSION['access_token']);
    //create some html to notify the user that they have been successfully authenticated to use this page
    echo "<h2>Authorised USer</h2>";
    echo "<p>Only users who have had their Google credentials authorised are able to view this page.</p>";
    //sign-out button created
    echo "<form action='index.php' method='post'> 
            <input type=''submit' name='signout' value='Sign Out'/>
            </form>";
} else {
    //if no access token exists redirect to the oauth2callback page which asks the user to sign in with their google
    // credentials
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
//checks to see if the sign out button has been pressed
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['signout'])) {
    //revoke the client token so the user can't use the app unless they sign in again
    $client->revokeToken($_SESSION['access_token']);
    //destroy the session
    session_destroy();
    //redirect to a different page (the home page of the website)
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
    header(' Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}
?>