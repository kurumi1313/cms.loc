<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd488b66ebf17ed6cb4eeeafe0c83c43c
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Engine\\DI\\' => 10,
            'Engine\\' => 7,
        ),
        'C' => 
        array (
            'Cms\\' => 4,
        ),
        'A' => 
        array (
            'Admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Engine\\DI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine/DI',
        ),
        'Engine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/engine',
        ),
        'Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cms',
        ),
        'Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd488b66ebf17ed6cb4eeeafe0c83c43c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd488b66ebf17ed6cb4eeeafe0c83c43c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd488b66ebf17ed6cb4eeeafe0c83c43c::$classMap;

        }, null, ClassLoader::class);
    }
}