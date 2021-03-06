<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInited8e91cd848c458620ed9c748921dd6f
{
    public static $files = array (
        '9dbdae23702dd82f269629400fde1afa' => __DIR__ . '/../..' . '/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInited8e91cd848c458620ed9c748921dd6f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInited8e91cd848c458620ed9c748921dd6f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInited8e91cd848c458620ed9c748921dd6f::$classMap;

        }, null, ClassLoader::class);
    }
}
