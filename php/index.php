<?php
// author: Kelsey De Los Reyes Andrews
//date: 16/03/2023
require_once __DIR__ . '/oauth-files/vendor/autoload.php';

session_start() ;
$client = new Google\Client();
$client->setAuthConfigFile("/KF6013/oauth-files/client-secret.json");
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

if (!empty($_SESSION['access_token'])) {
    $client->setAccessToken($_SESSION["access_token"]);
    $html = <<<HTML
    <!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <title>Members page</title>
        <link rel="stylesheet" type=\"text/css\" href=\"stylesheet.css\">
    </head>
    <main>
        <header>
            <h1>Coast City Sports Centre</h1>
        </header>
        <nav>
            <a href="../html/index.html">Home</a>
            <a href="../html/Evaluation.html">Technical Architecture</a>
            <a href="index.php">Members Page</a>
        </nav>
    
        <div id="test">
            <h2>Test Page</h2>
            <p>this is a test page. if this shows you have successfully sorted your php out. well done!</p>
        </div>
        
        <form action='index.php' method='post'>
        <input id="log-out" type="submit" name="log-out" value="Log out" />
    </form>
    
    </main>
    </html>
    HTML;

    echo $html;
} else {

    $redirect_uri = "http://" . $_SERVER["HTTP_HOST"] . "/KF6013/oauth2callback.php";
    header("Location: " . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['log-out'])) {
    //revoke the client token so the user can't use the app unless they sign in again
    $client->revokeToken($_SESSION['access_token']);

    session_destroy();

    //redirect to a different page (the home page of the website)
    $redirect = "http://" . $_SERVER["HTTP_HOST"] . "/KF6013/index.html";
    header( "Location: " . filter_var($redirect, FILTER_SANITIZE_URL));
    exit();
}
?>