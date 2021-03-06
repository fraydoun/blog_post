<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c2300c481aa072d958d12eff3fb38f2
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fraidoon\\Blog\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fraidoon\\Blog\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c2300c481aa072d958d12eff3fb38f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c2300c481aa072d958d12eff3fb38f2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c2300c481aa072d958d12eff3fb38f2::$classMap;

        }, null, ClassLoader::class);
    }
}
