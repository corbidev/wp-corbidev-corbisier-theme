<?php
if (!defined('ABSPATH')) exit;

spl_autoload_register(function (string $class): void {
    $prefix = 'CorbiDev\\Theme\\';
    $baseDir = __DIR__ . '/includes/';
    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) require_once $file;
    }
});

require_once __DIR__ . '/includes/services/SitesRepository.php';
require_once __DIR__ . '/includes/core/Bootstrap.php';

\CorbiDev\Theme\Core\Bootstrap::boot();