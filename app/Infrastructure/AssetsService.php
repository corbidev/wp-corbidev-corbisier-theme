<?php

namespace Corbidev\Infrastructure;

class AssetsService
{
    public function register(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue(): void
    {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            wp_enqueue_script(
                'corbidev-dev',
                'http://localhost:5173/resources/js/main.js',
                [],
                null,
                true
            );
            return;
        }

        $dist_path = get_template_directory() . '/public/dist';
        $dist_url  = get_template_directory_uri() . '/public/dist';

        $manifest_path = $dist_path . '/.vite/manifest.json';

        if (!file_exists($manifest_path)) {
            return;
        }

        $manifest = json_decode(file_get_contents($manifest_path), true);
        $main = $manifest['resources/js/main.js'];

        wp_enqueue_script(
            'corbidev-app',
            $dist_url . '/' . $main['file'],
            [],
            null,
            true
        );

        if (!empty($main['css'])) {
            foreach ($main['css'] as $css) {
                wp_enqueue_style(
                    'corbidev-style',
                    $dist_url . '/' . $css,
                    [],
                    null
                );
            }
        }
    }
}
