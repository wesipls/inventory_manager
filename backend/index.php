<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
    case '/read' :
        require __DIR__ . '/actions/read.php';
	break;
    case '/write' :
	require __DIR__ . '/actions/write.php';
	break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
?>
