<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd0f765df5939adc74c72493537c714cc
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TelegramBot\\Api\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TelegramBot\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/telegram-bot/api/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd0f765df5939adc74c72493537c714cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd0f765df5939adc74c72493537c714cc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd0f765df5939adc74c72493537c714cc::$classMap;

        }, null, ClassLoader::class);
    }
}
