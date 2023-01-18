<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$mobile_agents = array(
    'Android', 'AvantGo', 'BlackBerry', 'DoCoMo', 'Fennec', 'iPod', 'iPhone', 'iPad',
    'J2ME', 'MIDP', 'NetFront', 'Nokia', 'Opera Mini', 'Opera Mobi', 'PalmOS', 'PalmSource',
    'portalmmm', 'Plucker', 'ReqwirelessWeb', 'SonyEricsson', 'Symbian', 'UP.Browser',
    'webOS', 'Windows CE', 'Windows Phone', 'Xiino'
);

$is_mobile = false;

foreach ($mobile_agents as $agent) {
    if (stripos($user_agent, $agent) !== false) {
        $is_mobile = true;
        break;
    }
}

if ($is_mobile) {
    include 'm.html';
} else {
    include 'index.html';
}

?>
