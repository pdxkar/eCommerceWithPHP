<?php

// This file contains the database access information. 
// This file establishes a connection to MySQL and selects the database.
// This script is begun in Chapter 7.

// Set the database access information as constants:
//DEFINE ('DB_USER', 'root');
//DEFINE ('DB_PASSWORD', 'password');
//DEFINE ('DB_HOST', 'localhost');
//DEFINE ('DB_NAME', 'ecommerce2_test');

DEFINE ('DB_USER', 'test');
DEFINE ('DB_PASSWORD', 'test');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'ecommerce2');

// Make the connection:
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//$dbc = mysqli_connect ("localhost", "test", "test", "ecommerce2");

// Set the character set:
mysqli_set_charset($dbc, 'utf8');

// Omit the closing PHP tag to avoid 'headers already sent' errors!