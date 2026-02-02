<?php

namespace Corbidev;

use Corbidev\Infrastructure\AssetsService;

class Kernel
{
    protected array $services = [
        AssetsService::class,
    ];

    public function boot(): void
    {
        foreach ($this->services as $service) {
            (new $service())->register();
        }
    }
}
