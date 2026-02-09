<?php

namespace CorbiDev\Theme\Services;

final class SitesRepository
{
    public static function all(): array
    {
        $file = get_stylesheet_directory() . '/assets/data/sites.json';

        if (!file_exists($file)) {
            return [];
        }

        $data = json_decode(file_get_contents($file), true);
        return is_array($data) ? $data : [];
    }
}
