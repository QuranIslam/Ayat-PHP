<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', $user_agent)) {
    include 'm.html';
}
else {
    include 'index.html';
}

?>
