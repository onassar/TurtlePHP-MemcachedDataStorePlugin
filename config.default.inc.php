<?php

    /**
     * Namespace
     * 
     */
    namespace Plugin\MemcachedDataStore;

    /**
     * Plugin Config Data
     * 
     */

    /**
     * $benchmark
     * 
     * Whether memcached requests should be benchmarked for performance.
     * 
     * @var     bool (default: false)
     * @access  private
     */
    $benchmark = false;

    /**
     * $flushing
     * 
     * Key, which when passed in via $_GET, causes the cache to be bypassed (for
     * that request).
     * 
     * @var     string (default: 'bypass')
     * @access  private
     */
    $bypassKey = 'bypass';

    /**
     * $flushing
     * 
     * Whether or not to allow the data store to be flushed via a $_GET request.
     * 
     * @var     bool (default: true)
     * @access  private
     */
    $flushing = true;

    /**
     * $flushKey
     * 
     * Key, which when passed in via a $_GET parameter, will cause the data
     * store to be flushed.
     * 
     * @var     string (default: 'flush')
     * @access  private
     */
    $flushKey = 'flush';

    /**
     * $namespace
     * 
     * Used to ensure no key-conflicts.
     * 
     * @var     string (default: 'application.local')
     * @access  private
     */
    $namespace = 'application.local';

    /**
     * $servers
     * 
     * Specific the servers and ports that should be used for storage.
     * 
     * @var     array
     * @access  private
     */
    $servers = array();
    $server = array('127.0.0.1', '11211');
    array_push($servers, $server);, var)
    $servers = array(
        array('127.0.0.1', '11211')
    );

    /**
     * $pluginConfigData
     * 
     * @var     array
     * @access  private
     */
    $pluginConfigData = compact(
        'benchmark', 'bypassKey', 'flushing', 'flushKey', 'namespace',
        'servers'
    );

    /**
     * Storage
     * 
     */
    $key = 'TurtlePHP-MemcachedDataStorePlugin';
    \Plugin\Config::add($key, $pluginConfigData);
