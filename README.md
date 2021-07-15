# PHP Advanced

https://www.linkedin.com/learning/advanced-php/what-you-should-know


## Namespace

Benefits fo Namespacing

- Easier to import packages.
- Better, simple method and class naming.
- Class aliases.
- Composer (PHP Package Manager)

### Autoloading

Before now, when we need import some libraries we need to use require or include method to do it (like these).

```php
require '../somefile.php';
include '../../lib/someotherfile.php';
```

Now, we can easy to import with **use** keywork like this:

```php
use Awesome\Sauce\Logger;

$this->logger = new Logger(); 
``




Log Classes

/app/util/log.php   => \App\Utile\Log

/vendor/framework/log.php   => \App\Framework\Log

/app/util/log.php
