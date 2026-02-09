<?php

namespace CorbiDev\Theme\Core;

use CorbiDev\Theme\Services\SitesRepository;

/**
 * Bootstrap du thème enfant CorbiDev
 */
final class Bootstrap
{
    /**
     * Démarrage du thème
     */
    public static function boot(): void
    {
        add_action(
            'wp_enqueue_scripts',
            [self::class, 'enqueueAssets']
        );

        add_action(
            'wp_footer',
            [self::class, 'mountApp'],
            1
        );
    }

    /**
     * Chargement des assets Vite
     */
    public static function enqueueAssets(): void
    {
        wp_enqueue_style(
            'corbidev-corbisier-style',
            get_stylesheet_directory_uri() . '/dist/app.css',
            [],
            null
        );

        wp_enqueue_script(
            'corbidev-corbisier-app',
            get_stylesheet_directory_uri() . '/dist/app.js',
            [],
            null,
            true
        );

        wp_localize_script(
            'corbidev-corbisier-app',
            'CORBIDEV_SITES',
            SitesRepository::all()
        );
    }

    /**
     * Point de montage Vue
     */
    public static function mountApp(): void
    {
        if (!is_front_page()) {
            return;
        }

        echo '<div id="corbidev-sites-app"></div>';
    }
}
