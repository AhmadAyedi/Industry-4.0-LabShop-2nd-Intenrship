<?php
//echo $_SERVER['SERVER_ADDR'];


// Get the server's IP address
$server_ip = gethostbyname(gethostname());

// Print the IP address
echo $server_ip;
