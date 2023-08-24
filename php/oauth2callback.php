<?php
// author: Kelsey De Los Reyes Andrews
// date: 16/08/2023
require_once __DIR__.'/oauth-files/vendor/autoload.php';

session_start();
$client = new Google\Client();
$client->setAuthConfigFile('/KF6013/oauth-files/client-secret.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/KF6013/oauth2callback.php');
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/KF6013/index.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit();
}
?>