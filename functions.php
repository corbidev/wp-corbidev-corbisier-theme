<?php
/**
 * CorbiDev Corbisier Theme
 */

add_action('after_setup_theme', function () {
    // Support de la balise <title> gérée par WordPress
    add_theme_support('title-tag');

    // Boot du Kernel CorbiDev Theme
    if (!class_exists('\\CorbiDev\\Theme\\Kernel')) {
        return;
    }

    $theme        = wp_get_theme();
    $themeVersion = $theme instanceof WP_Theme ? $theme->get('Version') : null;

    \CorbiDev\Theme\Kernel::boot([
        'theme'          => 'corbidev-corbisier',
        'text_domain'    => 'wp-corbidev-corbisier-theme',
        'config_version' => '1.0',
        // Mode strict par défaut (pas de "validation_mode" explicite)
        'feature_flags'  => [
            'assets' => true,
        ],
        'paths'          => [
            'theme_root'   => get_theme_file_path(),
            'theme_assets' => get_theme_file_uri('assets'),
        ],
        'options'        => [
            'assets' => [
                'styles'  => [
                    // CSS compilé Tailwind en production
                    [
                        'handle' => 'corbisier-main',
                        'src'    => get_theme_file_uri('assets/css/app.css'),
                        'deps'   => [],
                        'ver'    => $themeVersion,
                        'media'  => 'all',
                        'env'    => ['production'],
                    ],
                ],
                'scripts' => [
                    // CDN Tailwind uniquement en développement / staging
                    [
                        'handle'    => 'corbisier-tailwind-cdn',
                        'src'       => 'https://cdn.tailwindcss.com',
                        'deps'      => [],
                        'ver'       => null,
                        'in_footer' => false,
                        'env'       => ['development', 'staging'],
                    ],
                    // JS spécifique du site (optionnel)
                    [
                        'handle'    => 'corbisier-app',
                        'src'       => get_theme_file_uri('assets/js/app.js'),
                        'deps'      => [],
                        'ver'       => $themeVersion,
                        'in_footer' => true,
                        'env'       => ['production', 'staging', 'development'],
                    ],
                ],
            ],
        ],
    ]);
});
