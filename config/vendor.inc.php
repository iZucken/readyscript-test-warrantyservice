<?php

namespace warrantyservice\config;
class Vendor
{
    static $loaded = false;
    static $failElaboration = null;
    static function tryLoad () {
        if (self::$loaded || !empty(self::$failElaboration)) {
            return;
        }
        $supposedVendorPath = __DIR__ . "/../vendor/autoload.php";
        if (!file_exists( $supposedVendorPath )) {
            self::$failElaboration = "Vendor autoload file not found";
            return;
        }
        if (!is_readable( $supposedVendorPath )) {
            self::$failElaboration = "Vendor autoload file is not readable";
            return;
        }
        try {
            require $supposedVendorPath;
            self::$loaded = true;
        } catch (\Throwable $throwable) {
            self::$failElaboration = "{$throwable->getFile()}:{$throwable->getLine()}: {$throwable->getMessage()}";
        }
    }
}