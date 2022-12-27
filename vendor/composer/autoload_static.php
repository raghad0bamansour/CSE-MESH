<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e125bb94ea7f19fffc90139d3a00abc
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e125bb94ea7f19fffc90139d3a00abc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e125bb94ea7f19fffc90139d3a00abc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0e125bb94ea7f19fffc90139d3a00abc::$classMap;

        }, null, ClassLoader::class);
    }
}
