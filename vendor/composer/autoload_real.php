<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7efd8527b98e7f93b2cf856648fe374d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit7efd8527b98e7f93b2cf856648fe374d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7efd8527b98e7f93b2cf856648fe374d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7efd8527b98e7f93b2cf856648fe374d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
