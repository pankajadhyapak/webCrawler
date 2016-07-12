<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3bfcb67b9f44b7e593f73cf3fbe0430c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Crawler\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Crawler\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Crawler',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3bfcb67b9f44b7e593f73cf3fbe0430c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3bfcb67b9f44b7e593f73cf3fbe0430c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
