<?php
// config/config.php

// base config
$base = require __DIR__ . '/config-base.php';

// user-override config
$user = [];
if (file_exists(__DIR__ . '/config-user.php')) {
    $user = include __DIR__ . '/config-user.php';
}

// override base with user config
$config = array_replace_recursive($base, $user);

return $config;
