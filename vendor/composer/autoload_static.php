<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1f26ee917d497b6b57169078703bed3
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hp\\SpaceExplorer\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hp\\SpaceExplorer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite1f26ee917d497b6b57169078703bed3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1f26ee917d497b6b57169078703bed3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite1f26ee917d497b6b57169078703bed3::$classMap;

        }, null, ClassLoader::class);
    }
}