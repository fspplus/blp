<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8743cf05928ea2a577faad8d8c2c3982
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPLEClient\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPLEClient\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8743cf05928ea2a577faad8d8c2c3982::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8743cf05928ea2a577faad8d8c2c3982::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}