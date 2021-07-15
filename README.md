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

### PHP Standard Interface

There are six different interfaces that the PHP SPL or the PHP Standard PHP Library provides.

PHP Standard PHP Library

- Standard set of PHP libraries and classes

1. Countable Interface

    abstract public int count (void)

2. OuterIterator Interface

    public Iterator getInnerIterator (void)

    *OuterIterator is an interface to iterate over iterators. What's an iterator? Well for now, let's just consider that an iterator is an extremely fast way of performing for each style loops over objects. So an OuterIterator is an interface to handle the necessary code for looping over a collection of objects that themselves can be looped over.*

3. RecursivelIterator Interface

    public ResursiveIterator getChildren(void)
    public bool hasChildren(void)

    *RecursiveIterator is an iterator that recursively loops over iterators. Recursion and iterators mixed in together means this one is even harder to probably get a good handle on what exactly it means. For now, just understand that it's going to be useful in certain cases with certain types of applications. In general though, you probably won't deal with this one too much.*

4. SeekableIterator interface

    abstract public void seek (int $position)
    
    *SeekableIterator interface. This one is actually a bit easier to grasp. This means the iterator is able to seek to a current position. Like an array, we can both loop through each element one after another or we can go right to an item at position five and for now we're done with iterators.*

5. SplObserver interface

    abstract public void update (SplSubject $subject)


6.  SplSubject interface

    abstract public void attach (SplObserver $observer)
    abstract public void detach (SplObserver $observer)
    abstract public void notify (void)


    These are companion interfaces that are designed to implement the observer design pattern. What is the observer design pattern? Good question. It means the pattern whereby you have a subject and any time something changes, it notifies its observer that something happened. This approach is used to develop event-driven programming loops. Change a user's password and an event occurs that says to send an email informing the user that their password was changed. In this case, we have a subject, meaning the user model or user table, and we have an observer tie to whenever we change that user's password. 

So these are all useful interfaces, but do they actually matter? In your code, when are you going to actually use them? The observer subject interfaces don't tend to be as useful unless you are writing your own eventing system. The iterator interfaces, luckily for all of us, tend to be more useful as an implementation that we'll explore later on. The countable interface, that one is both useful and easily implemented. Let's implement it right now. First, we'll open up our text editor. 

We'll open up in the directory that we've been working with before and we'll add a new interface to our table class in our interfaces directory in interface.php. So we're going to implement not just the table interface, log interface, but we're also going to add a comma and implement the countable interface and on line 19 we'll add a new method, public function count, and recall our count method has to return an integer. 

So in this case, we'll return the integer 10. Next, replace on line 24 where we're calling log to instead call count and remove our string that we're passing in and that's all that we needed. We just implemented the countable interface from the PHP SPL. If we save this file, go to our terminal and run it using PHP ./interfaces/interface.php, we see that we get foo and the number 10 being returned as we expected. 

The benefit of this is now if we need the ability to return the count of an object, we can type into this SPL interface and we required an object to implement a known method with a known method signature, but leaving the implementation details up to that object and the programmer themselves.

## Traits

PHP Traits overview

- Provide implementation details.

    *Cung cấp chi tiết triển khai.*

- Traits can be considered a close companion to interfaces. Whereas interfaces include no implementation logic, trait, on the other hand, do include implementation details of a set of methods you want to be included in a series of classes. 

    *Đặc điểm có thể được coi là một người bạn đồng hành thân thiết với các giao diện. Mặt khác, các giao diện không bao gồm logic triển khai, đặc điểm, bao gồm các chi tiết triển khai của một tập hợp các phương thức mà bạn muốn đưa vào một loạt các lớp.*


- The main reason to use a trait over a standard inheritance model, i.e., to simply make a parent class with the shared methods and inherent from that similar parent class, is a lot of the time, you don't want all your classes to inherit from the same base class. In other words, traits permit a style of horizontal code sharing, as opposed to purely vertical code sharing. 

    *Lý do chính để sử dụng một đặc điểm trên mô hình kế thừa tiêu chuẩn, tức là chỉ đơn giản tạo một lớp cha với các phương thức được chia sẻ và vốn có từ lớp cha tương tự đó, là rất nhiều lúc, bạn không muốn tất cả các lớp của mình kế thừa từ cùng một lớp cơ sở. Nói cách khác, các đặc điểm cho phép kiểu chia sẻ mã theo chiều ngang, trái ngược với kiểu chia sẻ mã theo chiều dọc hoàn toàn.*

Examples: 

- Logging is a typical example of where a trait's benefits are far greater than simply using standard inheritance. You need logging in probably a lot of your code, but not all of it, and you want to not have to rewrite the actual implementation details of how you log multiple times in your code base. 

    So we have a standard model, view, controller application. Model talks to the database. View displays stuff to the end user, and the controller layer handles the coordination between these two other layers. We want to log in most of our model classes and some of our controller classes, but our views, on the other hand, have essentially no need for any form of logging.

    Where would this type of code live? Traits are our answer in this case. Traits are reusable methods that can basically be loaded into any class and be used whenever we need them, simply by including that class.