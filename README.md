# PHP Advanced

https://www.linkedin.com/learning/advanced-php/what-you-should-know


## Namespace

Benefits fo Namespacing

- Easier to import packages.
- Better, simple method and class naming.
- Class aliases.
- Composer (PHP Package Manager)

### Autoloading with Composer

Before now, when we need import some libraries we need to use require or include method to do it (like these).

```php
require '../somefile.php';
include '../../lib/someotherfile.php';
```

Now, we can easy to import with **use** keywork like this:

```php
use Awesome\Sauce\Logger;

$this->logger = new Logger(); 
```

### Composer

Composer provides a convenient, automatically generated class loader for
this application. We just need to utilize it! We'll simply require it
into the script here so we don't need to manually load our classes.

```php
require __DIR__.'/<your_path>/vendor/autoload.php';
```

Example:

```
/app/util/log.php   => \App\Utile\Log
/vendor/framework/log.php   => \App\Framework\Log
```