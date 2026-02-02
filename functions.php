<?php

require_once dirname(__DIR__, 4) . '/vendor/autoload.php';

require_once __DIR__ . '/app/Kernel.php';

use Corbidev\Kernel;

$kernel = new Kernel();
$kernel->boot();
