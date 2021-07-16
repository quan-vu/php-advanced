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

## PHP Singleton

> A design pattern that restricts the instantiation of a class to one object.

**Singleton examples**

- Database connection
- Configuration

## PHP Abstract Class

```php
<?php

abstract class Database {
    abstract public function connection();
    
    public function disconnect() {
        // disconnect from database server
    }
}

class Mysql extends Database {
    public function connection() {

    }
}

$mysql = new Mysql();
```

## PHP Iterator

> Iterator is An object that enables you to traverse a container.

**What are iterators useful?**

- Multiple foreach loops.
- Series of tasks.
- Faster and less memory intensive.
- Stacking/Stackable iterators.
- abstract public mixed current (void)
- abstract public scalar key (void)
- abstract public void next (void)
- abstract public void rewind (void)
- abstract public boolean valid (void)

1. Filter

2. Mean

3. Mode

4. Median

- [Instructor] Let's turn our attention to some different patterns in PHP, away from architecture oriented patterns to more day in and day out sorts of problems. First up is iterators. So what is an iterator? The standard definition of an iterator is an object that enables you to traverse a container. It is a solution to a super common problem in PHP and in just about every other programming language, looping over stuff. In essence, an iterator gives us the ability to perform a standard foreach loop over a collection of objects in a programmatic and fast manner. At hearing this, you may be thinking, "And that's impressive, why?" Writing a foreach loop is not particularly challenging. Putting stuff into an array and loop over it, done. What do you need an iterator for? Let's ask a different question. Do you often have multiple foreach loops that you have to execute over a collection of data on different files? Say you have a series of steps that you have to perform for a set of data return from the database, probably at some point you've had this exact type of problem. Any time you think, "yes" to those types of questions, "Do I have multiple foreach loops, "a series of tasks, or a pipeline of work?" think about looking to an iterator to do that type of work. Iterators are great at these types of problems. But why an iterator over just a standard foreach loop? Pretty basic reason, iterators both tend to be faster, as well as less memory intensive to a general foreach loop. They also let us solve and design solutions to problems in much more elegant manners than a typical foreach loop allows us to. The real trick with an iterator isn't so much just using them once or twice on a collection of stuff, but instead using a whole group of iterators to work through a large collection of objects. That's the real trick. Iterators are stackable. So we can write one iterator to one solve problem, and then add on others to solve different problems. An iterator lets us write a class focused around one particular problem, and write another different class for a different problem. An iterator, in most cases, is a class that implements these five methods: current, being what the current value in the iterator is; key, being the current key at the current point in the iterator; next, being the next value in the iterator; rewind, meaning to go back to the start of the iterator; and valid, providing a way to check if the current key has a valid value for the iterator. This sequence of operations is the iterator pattern. When we loop over the iterator, first rewind is called to reset the iterator. Next, the valid method is called to ensure our value at the first position is valid. We call current or key or whatever our operation is being performed, and then next to advance to the next value in the iterator. And repeat the loop to valid, and then current, or key, next, and etc. So let's review our concept of an iterator. Iterator is a class that gives us the ability to loop over a collection of stuff. And it gives us the ability to build a pipeline of tasks. We can build an iterator that does some filtering, another one that does some organization, and another one that does some calculation. These iterators can then be stacked to loop over a collection of objects and the data that those objects have to filter, organize, and then calculate, all in a very nice pipeline. Imagine we have a collection of data. We need to first throw out any results that are bad. That's one iterator, a filter iterator, another one that calculates the mean, another that calculates the mode, and another one that calculates the median, and perhaps in the future we know we're going to have to add in more iterators to do more work down the line. That's our pipeline of work that our iterators can do for us.

## Stacking Iterator

We've talked earlier about how iterators are stackable. 

Because they are stackable we can perform a series of tasks with a series of iterators. In this way iterators become a much more powerful tool for solving lots of common problems in php. 

**What sort of tasks?** 

Tasks

- Data manipulation
- Calculations
- Data filtering
- Data buffering
- Many mofre

Pretty much anywhere you have used the forage loop in the past, php iterators are a viable solution to replace them. So let's stack an iterator and build a second iterator to work with our basic iterator that we built in the last video. Open up your code editor to the directory Iterators, and open our iterator.php file. 

We'll add a few blank lines after line 13, and on line 15 we'll add a new class, FilterRows. So it'll be class FilterRows extends FilterIterator. This iterator is using the filter iterator, which adds a new method, except. Except returns either true or false. True keeps processing the results. False ignores it and skips that entry from the rest of the iterators being run. You can imagine that our filter iterator simply drops any entries that return false. Next let's implement an except method. On line 16 add public function except. 

Except doesn't take any inputs, and on line 17 we'll get the current row being processed with this arrow getInnerIterator, which is a method call that returns the inner iterator, which itself is an object, so we can then do arrow current. This says get the inner iterator object. Once we have it, we wanna access the current value of that iterator. We'll save this as the variable current. 

Now current is an array with keys for each column in our csv row, and we know the last one has only one column for the blank row. So we can check if the count of the current is equal to one, and return false, else return true. So add on line 18 if count of current is equal to one, we want to return false. And outside of this we'll simply return true. Now how do we actually use this? That's the easy part. Add a new line after line 26 where we instatiate our basic iterator and write iterator is equal to new FilterRows, and pass in our instance of the iterator. And there we go, we just stacked our iterators. Notice all we have to do is instantiate a new instance of a second iterator, and pass in the instance of the iterator that we've already previously built. If we save this, go over to our terminal application, once again remembering to change into the directory for iterators, and run the command php iterators.php, we'll see that we no longer display that final blank row. Notice now all we have is the four rows of all the actual data that we have. You could keep building new iterators and stack them to provide more operations. For instance, you could build a new iterator, another filter iterator to scan the data provided for each column and ensure that it is valid and correct. You could add in another iterator to scan each of the rows and match up the data for that particular column to the actual column name. 

## SPL Iterators

- IteratorIterator : Common starter iterator
- FilterIterator : Implements accept method
- ArrayIterator : Array into an iterator
- DirectoryIterator : Is a FilesystemIterator loop over into content of derectory.
- RecursiveIterator

- Much like we discussed with interfaces, there are standard PHP iterators that we can use to build up our own iterators. Provided for us from the PHP standard PHP library. We've already seen two of these. 

Iterator Iterator

First is the Iterator Iterator, which wraps anything that implements the traversable iterator interface into an iterator. This is one of the most common starting iterators. A typical usage is just what you saw earlier, taking a SPL file object and converting it to an iterator for performing processing over it. 

Filter Iterator

Next one that we have already seen, it's the Filter Iterator. Again, this one adds an accept method that we can use to reject or include values in our iterator pipeline for further processing. 

Array Iterator

Next is the Array Iterator, which again tends to be a pretty common iterator to start with. It takes an array and turns it into an iterator. It has a host of methods that are available to duplicate some of the functionality from an array to be useful with an iterator. Such as, sorting by key and checking if an offset exists. 

Directory Iterator

Directory Iterator is a useful iterator to loop over the contents of a directory. File System Iterator extends this to provide an iterator that loops over the contents of a directory and returns a new SPL file object for each item in the directory. Whereas Directory Iterator returns the Directory Iterator instance for each item in the directory itself. 

Many of the SPL iterators have a recursive extension to them and Recursive Directory Iterator is our first version of this. In this case, the Recursive Directory Iterator acts like the File System Iterator but will recurse through a directory structure. So we can use this iterator to, for instance, scan a directory tree looking for something, stack it with the Filter Iterator to shortcut as needed when you can ignore part of a particular directory. 

Infinite Iterator

The Infinite Iterator will never stop looping over the contents of the iterator. Whenever it hits the end of the collection, it will just hit rewind and start back up. This is useful in cases where you might want to reduce a collection to a single value. This might be the solution to that particular type of problem. 

Limit Iterator

The Limit Iterator permits you to iterate over a subcollection of items in your iterator. Want to grab the first two thousand items in a collection and perform some operation before moving on? This iterator will let you solve that particular problem. The Recursive Iterator Iterator is an iterator designed to walk through iterators recursively. So you have a collection of data that has trialed information. 

For instance, related records that then need to be accessed and filtered and processed. This is the solution to that type of problem. You can build a Recursive Iterator Iterator to loop over and recurse into any particular data structure that you have and filter and process that data in turn. 

Callback Filter Iterator

The last iterator we'll see is the Callback Filter Iterator. Similar to the Filter Iterator, it allows you to filter items in an iterator. But what happens if you need to provide a solution for other people to use your iterators and for them to provide their own filtering methods? This iterator permits you to pass a callback that performs the filtering for your iterator. This type of callback filter iterator is commonly used in any packages or libraries that wrap up using iterators to provide access to collections of data. There are tons of other SPL iterator classes, but this collection of ten iterators should cover most of the cases you'll hit in day in-day out use. Just remember, if you have a series of tasks that you need to perform on a collection of data, look to an iterator as a possible solution.

## Generators

PHP generator overview

Generators is a routine that is designed to control the iteration behavior of a loop. which may sound pretty simple, and at the most basic level the conceptional idea is actually pretty easy to grasp. Let's look at an example, however, we want to provide a way to generate the Fibonacci numbers. 

Fibonacci is an algorithm used in mathematics to provide for the sequence, f of n is equal to f of n minus one, plus f of n minus two. Or, the number at position three is made by adding the numbers at position one and two together. This sequence typically starts with the seed values of zero and one for position one and two, respectively. 

So, following this pattern, we add zero and one to get one, and to get the next number we add one and one to get two, and two and one to get three, three and two to get five, five and three to get eight, and so on. As an algorithm, using the concept of a generator, it would look something like this. Let's walk through each of these pieces, one by one, and see exactly what's happening. 

First, we have a function, Fibonacci, that we are creating. Fibonacci defines two variables, the last and the current, ie., our seed values. Next, it yields one. 


### Yield

> The heart of the generator.

- yeild: value OR key and value OR null.

What does yield mean? Yield is the heart of the generator, so let's pay attention to this. Yield at its most basic level provides a value to the code looping over the generator and pauses the execution of the generator. Think of it this way, yield says "here code that called me, "take this value, do something with it, while you do so, "I will pause execution of the loop." 

After that external code is done performing whatever actions on the yielded value, the generator then goes on and continues performing its work. Facts of the Fibonacci function. Okay, we yield one, which means we pass it back to the exterior loop that is calling the generator and we pause execution for any processing to occur. 

After we're done with that external processing, we enter our while loop, doing the math to produce our new current and new last values, and then yield the current value. The execution of our generator is in the foreach loop, the value number we wind up looping over is our yielded values. So, this kicks off the sequence yields one, pauses execution to echo one, then enters our while loop, performs the math, yields the next value in the sequence, pauses execution to echo that value and repeats the while loop until we tell it to quit. 

Well, how do we tell the generator to quit? A generator will quit when you return a value. A generator will only return a value when we're exiting. So, to exit a generator, say you want a generator to end after displaying the first 10 Fibonacci values, you just return an empty value and the sequence will end. The example looks like this, with just a little bit of changes, we can turn our generator from an infinite loop into one that we can pass a value into and exit after we reach some particular position. Now, whenever we hit the position we pass in, the generator will skip and exit using the empty return. A generator can also yield a classic array style key, with a value pair. 

And again, some minor modifications we can change our generator to return a key with the value. Notice on our while loop, we can yield both the value i, as well as the current actual value for the Fibonacci sequence at that point i. Our implementation of using this Fibonacci function looks like this, we pass n Fibonacci six, as key is equal to value. That key again is yielded back and our value is also yielded. 

And we echo the key and the value, so we get zero one, one one, two two, three three, four five, five eight, and six 13, and so on, and so forth. As you might expect with PHP, you can even yield a value by reference. This is performed the same way you yield a return from a function, prepending an ampersand, to the front of the generator function. So in this case, we're passing in a value into countdown and we're referencing it from outside the generator and manipulating the value. In this case, we're building a list that counts down from three. 

Finally, generators can also yield a null value. These null values do get an automatic key applied to them. This can be useful for building up, say a collection where you occasionally want a null value returned, as opposed to a real value returned. Don't feel overly intimidated by generators, they are a pretty complex topic to work through. 

It's taking a lot of the complexity that's already in an iterator and hiding it behind some syntactic sugar. The trick is to understand that yield acts like a return, except rather than stopping the execution of the loop, only pauses it for some operation to occur.

## PHP Type Hint

### Type Declaration Options

- Class/ Interface
- self
- callable
- array
- bool
- float
- int
- string

### Strict Type Declarations

> declare(strict_types=1);
> Musr be the first line of your file

**Benefits of Strict Typing**

- There is a higher degree of assurance about the types of inputs.

### PHP Return Types

- Class/ Interface
- self
- callable
- array
- bool
- float
- int
- string

Example

```php
public function getUser(): UserInterface {
    return $this->userObj;
}
```

**null** Return Declarations

```php
function answer(): ?int {
    return null; // ok
}

function say(?string $msg) {
    if($msg) {
        echo $msg;
    }
}

say(null); // ok -- does not print
```



- [Instructor] So if you don't like type declarations in general, you are really going to dislike strict type declarations. Strict type declarations are a way for us to remove even more of the dynamic features of PHP. Recall in the last video I mentioned that PHP added some scalar type declarations. Also recall that we discussed how PHP, being a dynamically typed language, we can treat some types as other types without any real effort. This attempt to use floats 1.5 and 2.5 in our sum method will wind up having them being silently converted into the ends one and two, which may be what you want to do, but sometimes it isn't. Is there a way to tell PHP, so when I mean an integer, I mean I really, really must have an integer? In fact there is. Welcome to the declare syntax, which you have probably never used, but has been hanging around in PHP since PHP 4. In the past it was used for two specific cases. One to basically walk through code every time the parser ticked, and the second to specify the encoding of a file. Both were pretty unusual cases. I can't recall every seeing declare used before PHP 7. In PHP 7 we gained a new case, to declare strict types. This strict types enables for the file that the declare statement was added. It says for any function calls made inside of this file, use strict typing when looking at the scalar type declarations. It does not apply for any function calls made to an external file or made into that file. I'm going to explain this in further detail, so don't worry if that sounds a little confusing at the moment. Let's look again at our example. Here's our first initial example, right? We have a sum 1.5 and 2.5. In this case we're going to return three, because a and b are going to be silently converted to integer. If we add strict type declarations to this file, instead we're going to have a type error displayed, rather than actually executing the sum function. Here we have function.php that has strict types enabled, and caller.php does not. What happened? This actually returns three, because PHP will always defer to the caller when looking to evaluate strict types. And if you think about it, this makes sense. If we defer to the function author, or function.php, any code published possibly produces a ton of breakage, if the people using it do not want to use or are not used to following strict typing. Here again, since we defer to the caller, the call to sum will throw an error as it fails to strict typing in caller.php. There is however one special case with strict typing, sort of. If you declare requiring floats but pass an integer, this will pass an int as an int is really just a special case of a float. Special note again here, if you decide to use strict typing, the strict typing declaration must be the first line of your file in every file. Type declarations already give you a stronger idea about the values your methods are accepting. Strict type mode gives you an even higher level of assurance about the code being used and produced. You are adding assurances that you are not just passing values that could possibly match the type in question, but that they are the exact scalar type, and that really might matter. Even our example with the sum function passing a float versus an integer really does matter. Then again, strict typing can be kind of a pain and a hassle, so like all things in PHP, it's an optional feature. And you know what, if you use a library package that uses it, because it always defers to the caller, you'll never know or care if the authors of the library enable strict typing.


## 10. PHP Closures

A closure is an anonymous function. It's called an anonymous function because it's a function that doesn't have a name attached. Here's an example of a closure in PHP. 

*Closure (Đóng) là một chức năng ẩn danh. Nó được gọi là một hàm ẩn danh vì nó là một hàm không có tên đính kèm. Đây là một ví dụ về một bao đóng trong PHP.*

Notice there isn't much practical difference between this function and a normal function except we've dropped the name from the definition of the function.

*Lưu ý rằng không có nhiều sự khác biệt thực tế giữa hàm này và một hàm bình thường ngoại trừ chúng tôi đã loại bỏ tên khỏi định nghĩa của hàm.*

Example

```php
$func = function() {
    echo "I'm a closure because of I dont have name.";
}

echo $func(); // Result: I'm a closure because of I dont have name.
```

### Closure Scope

- Sope of closure is inside function only.
- It doesn't know anything outside function.

```php
$var = "Hello";
$func = function() {
    echo "{$var} world";
}

echo $func(); // Notice: Undefined variavle: var in
```

### Closure Parameters

- We can pass a variable to closure by use **use()** keyword.

Example 1:

```php
$var = "closure";
$func = function($var) {
    echo "{$var} called";
}

echo $func($var); // prints: "closure called"
```

Example 2:

```php
$var = "closure";
$func = function() use ($var) {
    echo "{$var} called";
}

echo $func(); // prints: "closure called"
```

Example 3:

```php
$var = "closure";
$func = function() use ($var) {
    echo "{$var} called";
    $var = "new value";
}

echo $func(); // prints: "closure called"
echo $var; // prints: "closure"
```

### Closure use for

- Strategy Pattern


## PHP Exception

### Exception Flow

1. Throw exception

2. Catch exception in a try/catch block

3. Process and deal with exception

4. Else 


**PHP exception overview**

Exceptions are a way to trigger an error state, or condition, in some part of our application, and let another part of our application handle that problem. 

A typical exception flow is an error condition is raised. At that point in our code we throw an exception. The caller of our code that threw an exception has a try/catch block at some point. 

These try/catch blocks are blocks of code that say to run this, and if an exception occurs, catch it and handle it in this particular way. So we catch it at this point and deal with it in some way. What happens if our application throws an exception and we didn't catch it? Well, in some cases your framework might deal with it and display an error message to the end user. 

In the worst case, the exception, if uncaught, will cause a PHP fatal error, which shows up to the end user as an HTTP 500 style error. So 

**What are our exceptions useful for?**

Well, you'll have, fairly often, conditions in your application in which some module will throw an error and you'll want to deal with it. Typically, methods have a limited subset of return types and what you can be expected to deal with. Exceptions give you a broader range of dealing with errors in your code. 

So we have a method in which we are finding a record from our database and we expect it to return the matching user object, except it may not find the record. Maybe it doesn't exist, or the user doesn't have permissions to access that record, or any number of other reasons. If all we look for is either the user object or a false value, it's a limited set of decisions we can make in a failure case. We don't know what caused the failure of returning the object, just that it wasn't returned. Exceptions are trying to give us more options towards solving whatever problem raised the particular exception. So here's an exception. We have a method, process credit card, that processes a credit card, and we've placed it inside of a try block, and outside there is a catch block that says to catch an exception e. And then we deal with it by logging the exception message and returning false. The exception class is the base for all exceptions in PHP Five, and all userland exceptions in PHP Seven. By userland I mean everything you, the user of PHP, owns and can change, versus the internals of PHP. PHP Seven changed some of the handling for exceptions and errors, but we don't have to worry about that at the moment. 

Exception classes have a constructor that takes a message and integer code, like a Unix error code, and a possible previous exception. You can get the message, the previous exception, the code, the file, and the line where the exception was thrown, as well as the stack trace of the path your code took to get to the exception. In PHP Seven, a new interface, throwable, was created. Throwable is designed around the concept of anything that can be thrown will be thrown with the throw syntax, so exceptions basically. Also in PHP, a new class, error, was created. 

Error is the base for all internal PHP errors. This means, in PHP Seven, what used to be a fatal error is now a standard error that can be caught and dealt with. Though truthfully, most errors that PHP raises are actual problems in your code and shouldn't be ignored or skipped over. Exceptions should be used to derive context for a failure case. 

You should not handle general cases or throwing exceptions for a normal condition in your code. A common example here is looping over a set of stuff. When you hit the end of the array, it's not an exception, it's just the end of the loop. There's no need for an exception in this case. You can have multiple catch blocks when catching an exception. 

So if you have a block of code that throws multiple types of exceptions you can catch each one and handle it differently. The first catch block that matches the exception type will be used. Note, since all userland exceptions derive from the base class of exception, exception will catch everything that you throw. PHP 5.5 added the concept of a finally block. 

The finally block is a block of code that will always execute regardless of an exception being raised or not. The finally block can be used in the place of a catch block or after a catch block. In essence, the finally block gives you chance to deal with any last things before returning to your normal programming flow. 

Notice what I said just now, the normal programming flow. Exceptions are explicitly a rare case. You shouldn't need or have exceptions scattered throughout your code. 

They're designed to catch the rare occurrences in your code. One of the most common places they'll be used for is when you call out to a library or an external service that is performing a fair bit of work, and that has a variety of returns that you'll need to deal with.

### Exception Method

```php
public __construct([string $message = "" [, int $code = 0 [, Throwable $previous = NULL]]])

final public string getMessage (void)

final public Exception getPrevious (void)

final public string getMessage (void)

final public mixed getCode (void)

final public string getFile (void)

final public int getLine (void)

final public array getTrace (void)

final public string getTraceAsString (void)
```

### Exceptions: Explicitly Caught

```php
try {
    do_a_thing();
} catch (MyCustomException $e) {
    process_exception($e);
} catch (MyCustomException $e) {
    process_exception($e);
}
```

If you have a block of code that throws multiple types of exceptions you can catch each one and handle it differently. 

The first catch block that matches the exception type will be used. Note, since all userland exceptions derive from the base class of exception, exception will catch everything that you throw. PHP 5.5 added the concept of a finally block. 

The finally block is a block of code that will always execute regardless of an exception being raised or not. The finally block can be used in the place of a catch block or after a catch block. In essence, the finally block gives you chance to deal with any last things before returning to your normal programming flow. 

## PHP SPL Exceptions

- LogicException

    COmmon base exception class

- RuntimeException

### Exception Tree

- LogicException (extends Exception)
    - BadFunctionCallException (Invalid call to a function)
        - BadMethodCallException (Invalid call to a magic method)
    - DomainException (Values do not match)
    - InvalidArgumentException (Invalid params type)
    - LengthException (Length is in valid)
    - OutOfRangeException (Illegal index at compile time)

- RuntimeException (extends Exception)
    - OutOfBoundsException (Illegal index at runtime)
    - OverflowException (Add to container already full)
    - RangeException (Runtime version of DomainException)
    - UnderflowException (Remove from an empty container)
    - UnexpectedValueException (Value does not match expectations)

### Most Common Exception

- BadMethodCallException
- InvalidArgumentException
- BadFunctionCallException