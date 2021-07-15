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

## PHP Interfaces

Interface in PHP is an abstract type that contains no data ro code, but defines behaviors as methid signatures.

<em>
Giao diện/Interface trong PHP là một kiểu trừu tượng không chứa dữ liệu hoặc mã, nhưng định nghĩa các hành vi dưới dạng chữ ký của phương thức.
</em>

**Why are interfaces useful?**

An interface is quite simply an abstract type that contains no data or code, but defines behaviors as method signatures. In other words, this is a class in which we can define methods and their signatures, but not define exactly how those particular methods are supposed to work. Well why is this useful then? Isn't it enough to just define a class that defines the methods and implement those same methods and just make it easy to override if you need to? I.e. the normal pattern of how you've seen classes and objects in essentially any other project before. The short answer is well, no. 

The longer answer is it becomes more and more useful when the users of your object's API can take both the implementation details and the signature details of your implementation independent of each other. Let's focus in on the problem that we're dealing with here. 

Interfaces are a tool in our wide range of tools to ship code that other people will want to interact with, not the end result of that code of filling in a form and saving details or buying stuff, but instead as a framework like Laravel, or Symfony, or Kick PHP or even a general purpose library for interfacing say with databases or some external tool or service. Have some code that you're writing for a single project or a customer? Interfaces aren't something that you'll need to reach for very often in that case. They are useful when your customer is other programmers. 

Interfaces, for instance, are a great tool when you want to tell other programs "Here's a thing that I'll be shipping. "Want to use it? "I'll respond to objects that implement "this type of interface." What are some limitations of an interface? Well like I said at the top, interfaces only define method definitions, but without any implementation details. 

If you want to ship implementation details, you could either write a real class that can be extended or implement a trait, which we will discuss later on in this course. Interfaces, as you might have realized, at some point can only define the public functions of an object, which makes sense. 

An interface shouldn't describe the private or protected API of a class, only the public interface that other code would interact with and see. Here's an interface example along with the corresponding implementer class. Pretty simple. We create a file using the keyword interface and then corresponding class implements that same interface. 

One of the real keys with an interface is that you can instead of type hinting to an implementation in an exact class name, you can instead type hint to an interface. 

This gives you the ability to write an API and say, "Okay, as long as you provide an object "that respects this public API, "my code will do what you expect." Interfaces allow us to create more fluent and abstract APIs for objects over a standard inheritance model that you have worked with in the past.


### Sample Inteface

*An interface shouldn't describe the private or protected API of a class, only the public interface that other code would interact with and see. Here's an interface example along with the corresponding implementer class. Pretty simple. We create a file using the keyword interface and then corresponding class implements that same interface.*

```php
<?php
interface LogInterface {
    public function  log(string $message);
}
```

### Type Hint to an Interface

*One of the real keys with an interface is that you can instead of type hinting to an implementation in an exact class name, you can instead type hint to an interface.*

```php
<?php
class Query {
    public function logQuery(LogInterface $logger, string $message) {
        $logger->log($message);
        return true;
    }
}
```