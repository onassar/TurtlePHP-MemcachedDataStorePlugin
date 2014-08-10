<?php

    /**
     * Namespace
     * 
     */
    namespace Plugin\MemcachedDataStore;

    /**
     * Data
     * 
     */

    // Key, which when passed in _GET, which flush the data store
    $flushKey = 'flush';

    // Whether or not to allow the data store to be flushde
    $flushing = true;

    // Key, which when passed in _GET, bypasses the cache
    $bypassKey = 'bypass';

    // Namespace for ensuring no key-conflicts
    $namespace = 'application.local';

    // Server addresses and ports
    $servers = array(
        array('127.0.0.1', '11211')
    );

    /**
     * Config storage
     * 
     */

    // Store
    \Plugin\Config::add(
        'TurtlePHP-MemcachedDataStorePlugin',
        array(
            'flushKey' => $flushKey,
            'flushing' => $flushing,
            'bypassKey' => $bypassKey,
            'namespace' => $namespace,
            'servers' => $servers
        )
    );