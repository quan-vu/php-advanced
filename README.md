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

## PHP OOP Advanced

PHP has a class of features for object oriented programming you may not have experienced that much, that will help you craft better software. PHP, like many other languages, has a feature set called Magic Methods.

### PHP Magic Methods

- Prefix with __ (2 underscore)
- __sleep : serialize($Object)
- __wakeup : unserialize($ObjectSerialized)
- __invoke

    ```php
    class Compare {
        public function __invoke($a, $b) {
            return $a === $b;
        }
    }

    $compare = new Compare;
    var_dump($compare(1,2)); // false
    ```
- __debugInfo : var_dump($Object)
- __toString
- __set : set object property
    - $Object->property_does_not_exist = 5
- __get : get object property
    - echo $Object->property_does_not_exist
- __isset
    - empty($Object->property_does_not_exist) || isset($Object->property_does_not_exist)
- __unset
    - unset($Object->property_does_not_exist)
- __call
    - $Object->property_does_not_exist
- __callStatic
    - $Object::property_does_not_exist

**What is a Magic Method?** 

Magic Methods are so called because they let you add magic to automatically happen whenever you interact with your PHP objects. Magic Methods are always prefixed with a double underscore. And, in fact, PHP recommends you do not write any method names with a double underscore, as PHP may, in the future, add new Magic Methods. 

Magic Methods are designed to give you the ability to do some work for free, or to have an overwrite without having to dive into the nitty gritty of the PHP internals. In essence, Magic Methods are the documented way for you to override some core behavior or have work happen at certain point in times in a PHP objects lifetime. 

Let's explore some examples and this may become more clear. Sleep is fired when you serialize an object and correspondingly, wakeup is fired when the object is unserialized. An example is you have a large object, that when serialized, has some state that doesn't need to be stored, because the object can retrieve it. Getting rid of this state before serializing it is probably useful. Correspondingly, you need to restore this information when unserializing an object. Wakeup is the solution to that. Invoke is a super powerful Magic Method. It gives us the ability to create classes that are called invokable classes. In essence, we create classes that can have one method, their invoke method. And simply call that class, and the invoke method is executed. We have in essence replaced one-off methods with an invokable class. Or wrapping up logic that might have been an enclosure instead into this invokable class. Let's look at an example of how invoke works. Here we have a class, Compare, with a single method, invoke, that compares two values and returns if they are exactly equal. We simply initialize the class, call the class and pass our two values. And when we execute it, we get the result of either true or false. 

In this case, false. Simplistic example to be sure. But invoke becomes this very powerful way of wrapping up common bits of logic in the classes that we use to cross parts of your application. Imagine this code instead giving you the ability to check a valid order number for your system. It's useful in a wide range of places and you just created a simple class to wrap up all that logic for you. Debug info is called anytime you execute var dump on an object. This gives you the ability to, for instance, provide help when someone is debugging your object. Or add more contextual information that your object knows about, but isn't revealed in the standard dump of the object itself. Those of you coming from the Java world or C Sharp, will recognize your old friend, toString. In PHP, it does the same thing. When you want a string representation of the object, this method gets called and gives you the ability to determine what string to return. The last few Magic Methods all deal with a similar problem. What happens when you attempt to examine or use a non-existent property or method name for an object? Overriding these methods gives you the ability to do really interesting things. Your objects can respond to method calls that it may not have access to at that point in time, until something else first happens. You want a database system to be able to determine information about a query that hasn't yet run. These methods give you the tools to do that type of problem solving. Set and get are called when we attempt to set or get a property on a PHP object that doesn't exist. Imagine you have a library that deals with a price value and you want to return that price as a string or as a float. You can write a Magic getter and a Magic setter for price string and price float and alias them to access the price property in very short order. Isset is designed to be called when we attempt to call empty or isset on a property that doesn't exist. It's cousin, Magic unset, is called when we call unset on a property that doesn't exist. The final Magic Methods that we'll look at are call and callStatic. Each of these is called when we attempt to call either a method in an object context or in a static context. So Magic Methods, 

**What are Magic Method good for?** 

Magic Methods aren't a silver bullet for all occasions. Most of your code will never need a single Magic Method. And there are good reasons for that. 

*Phương pháp Ma thuật không phải là một viên đạn bạc cho mọi trường hợp. Hầu hết mã của bạn sẽ không bao giờ cần một Phương pháp Ma thuật duy nhất. Và có những lý do chính đáng cho điều đó.*

Magic Methods sometimes do weird things without your knowledge. That's how they work. They're magic. 

*Phương pháp Ma thuật đôi khi làm những điều kỳ lạ mà bạn không biết. Đó là cách chúng hoạt động. Chúng là ma thuật.*

Magic stuff sometimes just happens without your knowledge or any warning. This stuff just happens. 

*Những điều kỳ diệu đôi khi chỉ xảy ra mà bạn không biết hoặc không có bất kỳ cảnh báo nào. Công cụ này chỉ xảy ra.*

However, on those occasions where you really need the magic, they provide it. It'll save you a ton of time and provide you with a nice, first-class solution to some very thorny problems.

*Tuy nhiên, trong những trường hợp bạn thực sự cần phép thuật, họ sẽ cung cấp nó. Nó sẽ giúp bạn tiết kiệm rất nhiều thời gian và cung cấp cho bạn một giải pháp tốt nhất, hạng nhất cho một số vấn đề rất hóc búa.*

## PHP Constructor and Deconstructor

Constructors and deconstructors are the next advanced PHP object oriented programming topic we should cover. Constructors and deconstructors are methods that PHP calls internally whenever you create a new instance of an object or destroy an instance of an object. They are another example of these magic methods. 

### Constructor

> Initialize state of object when you create new instance of the class.
> Initialize: Debug or Inject dependencies.

A constructor enables you to initialize some state for your object at the point that you create a new instance of the class. The benefit here is that you can pass in state to your object or you dependencies and have that state and dependency stick around for the lifetime of that object. 

Say you have a class that interfaces with an API for instance a credit card processing system and this API has the ability to toggle a debug mode. 

Anytime you create a new instance of this class on you staging and development environments you can pass a variable that tells the class to toggle this flag for being in debug mode. You can also typically do things like inject your dependencies at this particular point. 

### Deconstructor

> Destroy any state of object that needs to be released.

- Teardown:
    - FIle and database connections


What about a deconstructor? 

If constructors create state, deconstructors do the opposite they destroy state. The goal here is to destroy any other state that your object has that needs to be released. Common examples of when this is useful is classes that are designed to write out information to a file or that hold a persistent connection to a data base or some other external service. 

You don't want either of these connections sitting around after the class is no longer in use so adding a decontructor remove the connection is a useful operation in these cases. So when does a deconstructor run? This is a fun question. It's relatively easy to know when a constructor runs it's when you run the command new instance of some object but a deconstructor on the other hand there's not always a clear time in which you say destroy this instance of a class. 

**When the deconstructor runs?**

Once PHP knows there are no more references to that class or that PHP itself is performing a shut down ie. that the request is completed and everything is being completed on PHP side, that is when the deconstructor runs. 

There are some rules around dealing with parent constructors and deconstructors. If a child class has no constructor or deconstructor code it will call the parent constructor or destructor however, if a child class explicitly defines a construct or destruct method then you have to explicitly call the parents construct or destruct method. Let's play around with some of this now. 

Open up your code editor to the directory we've been working in up to this point. We're going to add in a new directory for object oriented programming and we'll label that directory o o p. Here in our directory o o p we'll add a new file for structs dot php. We'll add our open PHP tags and we'll create a new class database on line two. 

Here we'll add a new public function, construct on line three. Remember that construct because it is a magic method has two double underscores at the front of the method name. This method is going to take one parameter that we'll call input. And on line four we'll echo the input bar and add a new line to the end. So that's echo double quotes, wrap our input bar in curly braces and then add the new line command. Let's add a few blank lines after line five and add a new public function destruct. Again destruct is a magic method so it includes the two double underscores at the front. Destruct here cannot take any arguments as you might suspect as destruct may not necessarily be called by you yourself. On line eight we'll just echo destruct along with a new line. And then we'll finally get out of this class and on line 12 we'll add object is gonna be equal to new database. Save this and run the command p h p o o p structs dot p h p well that was fun we got a big PHP warning and nothing really worked properly. Let's go back to the editor and see what happened. Oh right we needed to pass an input to our constructor. So where are the inputs to our constructor? They're the values we pass inbetween the object parenthesis. Notice we are literally making a function call out of constructing or initializing our object. So on line 12 we'll add passing the string construct and now let's save this and run it again. And here we can see that our magic methods construct and deconstruct ran one after the other. Our deconstructor fired after there were no more references to the object and PHP cleaned up the instance of that particular object. Pretty simple.