TurtlePHP-MemcachedDataStorePlugin
======================

### Sample plugin loading:
``` php
require_once APP . '/vendors/PHP-MemcachedCache/MemcachedCache.class.php';
require_once APP . '/plugins/TurtlePHP-BasePlugin/Base.class.php';
require_once APP . '/plugins/TurtlePHP-MemcachedDataStorePlugin/MemcachedDataStore.class.php';
$path = APP . '/config/plugins/memcachedDataStore.inc.php';
TurtlePHP\Plugin\MemcachedDataStore::setMemcachedDataStorePath($path);
TurtlePHP\Plugin\MemcachedDataStore::init();
```
