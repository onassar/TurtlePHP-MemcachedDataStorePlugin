<?php

    // namespace
    namespace Plugin;

    // dependency check
    if (class_exists('\\Plugin\\Config') === false) {
        throw new \Exception(
            '*Config* class required. Please see ' .
            'https://github.com/onassar/TurtlePHP-ConfigPlugin'
        );
    }

    // dependency check
    if (class_exists('\\MemcachedCache') === false) {
        throw new \Exception(
            '*MemcachedCache* class required. Please see ' .
            'https://github.com/onassar/PHP-MemcachedCache'
        );
    }

    /**
     * MemcachedDataStore
     * 
     * Memcached data store plugin for TurtlePHP
     * 
     * @author  Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class MemcachedDataStore
    {
        /**
         * _configPath
         *
         * @access  protected
         * @var     string
         * @static
         */
        protected static $_configPath = 'config.default.inc.php';

        /**
         * _initiated
         *
         * @access  protected
         * @var     bool
         * @static
         */
        protected static $_initiated = false;

        /**
         * init
         * 
         * @access  public
         * @static
         * @return  void
         */
        public static function init()
        {
            if (self::$_initiated === false) {
                self::$_initiated = true;
                require_once self::$_configPath;
                $config = \Plugin\Config::retrieve(
                    'TurtlePHP-MemcachedDataStorePlugin'
                );
                \MemcachedCache::init(
                    $config['namespace'],
                    $config['servers'],
                    $config['benchmark']
                );
                if ($config['flushing'] === true) {
                    \MemcachedCache::checkForFlushing($config['flushKey']);
                }
                \MemcachedCache::setupBypassing($config['bypassKey']);
            }
        }

        /**
         * setConfigPath
         * 
         * @access  public
         * @param   string $path
         * @return  void
         */
        public static function setConfigPath($path)
        {
            self::$_configPath = $path;
        }
    }

    // Config
    $info = pathinfo(__DIR__);
    $parent = ($info['dirname']) . '/' . ($info['basename']);
    $configPath = ($parent) . '/config.inc.php';
    if (is_file($configPath) === true) {
        MemcachedDataStore::setConfigPath($configPath);
    }
