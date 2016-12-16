<?php

// This file was created by me because the author doesn't seem to have provided the code for 
// the contact or sitemap pages.  It is a modified copy of the cart.php file.

// Require the configuration before any PHP code:
require('./includes/config.inc.php');

// Check for, or create, a user session:
if (isset($_COOKIE['SESSION']) && (strlen($_COOKIE['SESSION']) === 32)) {
	$uid = $_COOKIE['SESSION'];
} else {
	$uid = openssl_random_pseudo_bytes(16);
	$uid = bin2hex($uid);
}

// Send the cookie:
setcookie('SESSION', $uid, time()+(60*60*24*30));

// Include the header file:
$page_title = 'Placeholder for Contact and SiteMap';
include('./includes/header.html');

// Require the database connection:
// (Probably not necessary)
//require(MYSQL);

include('./views/placeholderForContactAndSiteMapPages.html');


// Finish the page:
include('./includes/footer.html');
?>