<?php
namespace CorbiDev\Theme\Core;

use CorbiDev\Theme\Services\SitesRepository;

final class Bootstrap
{
    public static function boot(): void
    {
        add_action('wp_enqueue_scripts', [self::class, 'enqueueAssets']);
        add_action('wp_footer', [self::class, 'mountApp'], 1);
    }

    public static function enqueueAssets(): void
    {
        $dist = get_stylesheet_directory() . '/dist';

        if (!file_exists($dist . '/app.js')) {
            return;
        }

        if (file_exists($dist . '/app.css')) {
            wp_enqueue_style(
                'corbidev-corbisier-style',
                get_stylesheet_directory_uri() . '/dist/app.css',
                [],
                filemtime($dist . '/app.css')
            );
        }

        wp_enqueue_script(
            'corbidev-corbisier-app',
            get_stylesheet_directory_uri() . '/dist/app.js',
            [],
            filemtime($dist . '/app.js'),
            true
        );

        wp_localize_script(
            'corbidev-corbisier-app',
            'CORBIDEV_SITES',
            SitesRepository::all()
        );
    }

    public static function mountApp(): void
    {
        echo '<div id="corbidev-sites-app"></div>';
    }
}
