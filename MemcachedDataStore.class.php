<?php

    // namespace
    namespace Plugin;

    /**
     * MemcachedDataStore
     * 
     * Memcached Data Store plugin for TurtlePHP.
     * 
     * @author  Oliver Nassar <onassar@gmail.com>
     * @abstract
     * @extends Base
     */
    abstract class MemcachedDataStore extends Base
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
         * _checkDependencies
         * 
         * @access  protected
         * @static
         * @return  void
         */
        protected static function _checkDependencies(): void
        {
            static::_checkConfigPluginDependency();
            static::_checkMemcachedCacheDependency();
        }

        /**
         * _setupMemcachedConnection
         * 
         * @access  protected
         * @static
         * @return  void
         */
        protected static function _setupMemcachedConnection(): void
        {
            $configData = static::_getConfigData();
            $namespace = $configData['namespace'];
            $servers = $configData['servers'];
            $benchmark = $configData['benchmark'];
            \MemcachedCache::init($namespace, $servers, $benchmark);
            if ($configData['flushing'] === true) {
                \MemcachedCache::checkForFlushing($configData['flushKey']);
            }
            \MemcachedCache::setupBypassing($configData['bypassKey']);
        }

        /**
         * init
         * 
         * @access  public
         * @static
         * @return  bool
         */
        public static function init(): bool
        {
            if (static::$_initiated === true) {
                return false;
            }
            parent::init();
            static::_setupMemcachedConnection();
            return true;
        }
    }

    // Config path loading
    $info = pathinfo(__DIR__);
    $parent = ($info['dirname']) . '/' . ($info['basename']);
    $configPath = ($parent) . '/config.inc.php';
    MemcachedDataStore::setConfigPath($configPath);
