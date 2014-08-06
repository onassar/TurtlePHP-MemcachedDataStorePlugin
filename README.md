TurtlePHP-MemcachedDataStorePlugin
======================

``` php
require_once APP . '/vendors/PHP-MemcachedCache/MemcachedCache.class.php';
require_once APP . '/plugins/TurtlePHP-MemcachedDataStorePlugin/MemcachedDataStore.class.php';
\Plugin\MemcachedDataStore::init();
```

``` php
...
\Plugin\MemcachedDataStore::setConfigPath('/path/to/config/file.inc.php');
\Plugin\MemcachedDataStore::init();
```
