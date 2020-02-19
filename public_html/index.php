<?php
$i = 0;
try {
switch ($i) {
    case "0":
        include '../private_html/pages/home.php';
        break;
    case "1":
        include '../private_html/pages/maintenance.php';
        break;
    case "2":
        include '../private_html/pages/update.php';
        break;
	case "3":
        echo("BAKA! BAKA! BAKA! BAKAAAAAAA!");
        break;
	default:
		include '../private_html/pages/home.php';
		break;
}
} catch (Exception $e) {
    echo 'BAKA! I caught an exception: ',  $e->getMessage(), "\n";
}