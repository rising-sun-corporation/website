<?php
$i = 0;
try {
switch ($i) {
    case "0":
        include 'pages/home.php';
        break;
    case "1":
        include 'pages/maintenance.php';
        break;
    case "2":
        include 'pages/update.php';
        break;
	case "3":
        echo("BAKA! BAKA! BAKA! BAKAAAAAAA!");
        break;
	default:
		include 'pages/home.php';
		break;
}
} catch (Exception $e) {
    echo 'BAKA! I caught an exception: ',  $e->getMessage(), "\n";
}