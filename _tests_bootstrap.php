<?php
if (extension_loaded('spl_types')) {
    throw new \LogicException('PHP extension spl_types is loaded. Tests of this fallback library can not be tested.');
}

require_once 'vendor/autoload.php';
