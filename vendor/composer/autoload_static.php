<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitffb5ddfd29fa021fb49227ba1a97b78e
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kvash\\Gidpay\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kvash\\Gidpay\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitffb5ddfd29fa021fb49227ba1a97b78e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitffb5ddfd29fa021fb49227ba1a97b78e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitffb5ddfd29fa021fb49227ba1a97b78e::$classMap;

        }, null, ClassLoader::class);
    }
}