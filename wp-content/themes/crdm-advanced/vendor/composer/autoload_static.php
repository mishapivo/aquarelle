<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit89cc43e5acd50d42543eea0c9aebcfe6
{
    public static $files = array (
        'ff94b54cc49d91067b6c55e8792511c4' => __DIR__ . '/..' . '/aristath/kirki/kirki.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Crdm\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Crdm\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Crdm\\Admin\\Init' => __DIR__ . '/../..' . '/app/Admin/Admin.php',
        'Crdm\\Customizer\\Background' => __DIR__ . '/../..' . '/app/Customizer/Background.php',
        'Crdm\\Customizer\\BorderRadius' => __DIR__ . '/../..' . '/app/Customizer/BorderRadius.php',
        'Crdm\\Customizer\\ColorVariant' => __DIR__ . '/../..' . '/app/Customizer/ColorVariant.php',
        'Crdm\\Customizer\\Content' => __DIR__ . '/../..' . '/app/Customizer/Content.php',
        'Crdm\\Customizer\\Footer' => __DIR__ . '/../..' . '/app/Customizer/Footer.php',
        'Crdm\\Customizer\\Init' => __DIR__ . '/../..' . '/app/Customizer/Init.php',
        'Crdm\\Customizer\\Menu' => __DIR__ . '/../..' . '/app/Customizer/Menu.php',
        'Crdm\\Customizer\\PageHeader' => __DIR__ . '/../..' . '/app/Customizer/PageHeader.php',
        'Crdm\\Customizer\\Sidebar' => __DIR__ . '/../..' . '/app/Customizer/Sidebar.php',
        'Crdm\\Front\\Init' => __DIR__ . '/../..' . '/app/Front/Front.php',
        'Crdm\\Setup' => __DIR__ . '/../..' . '/app/Setup.php',
        'Crdm\\Utils\\Helpers' => __DIR__ . '/../..' . '/app/Utils/Helpers.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit89cc43e5acd50d42543eea0c9aebcfe6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit89cc43e5acd50d42543eea0c9aebcfe6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit89cc43e5acd50d42543eea0c9aebcfe6::$classMap;

        }, null, ClassLoader::class);
    }
}
