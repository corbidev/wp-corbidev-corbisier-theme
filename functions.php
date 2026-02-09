<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Autoload PSR-4 du thème enfant CorbiDev
 */
spl_autoload_register(function (string $class): void {
    $prefix = 'CorbiDev\\Theme\\';
    $baseDir = __DIR__ . '/includes/';

    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
});

/**
 * Inclusion explicite des classes critiques
 */
require_once __DIR__ . '/includes/services/SitesRepository.php';
require_once __DIR__ . '/includes/core/Bootstrap.php';

/**
 * Boot sécurisé
 */
if (class_exists(\CorbiDev\Theme\Core\Bootstrap::class)) {
    \CorbiDev\Theme\Core\Bootstrap::boot();
}
