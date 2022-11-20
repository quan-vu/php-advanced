# PHP OOP

Introduction

- Class/Blueprint
- Instance

## Abstract Class

Abstract class can have method without body.

- Redeclare all abstract methods.
- The arguments must be the same.
- Method in child class can have additional arguments with default value.
- Method 's signature must be the same.
- Visibility of methods must be same or less retricted.
- Object can not be created from the abstract class (important).

## Interface

An Interface is provided so you can describe a set of functions and then hide the final implementation of those function in implementing class.

This allows you to change the IMPLEMENTATION of those functions without changing how you use it.

## Trait

- Solve duplicate code OR mean anti copy & paste action.
- Apply its functions for any class which use it.
- Use Trait to split popular functions.
- Reduce code.
- In inheritance, Trait overwite method of parent class if has same method name.

**Problem**

If you can copy and paste the code from one class to another and we've all done this,even through we try not to because its code duplication.

*Nếu bạn có thể sao chép và dán mã từ lớp này sang lớp khác và tất cả chúng ta đã làm điều này, ngay cả khi chúng tôi cố gắng không làm vậy vì mã của nó bị trùng lặp.*

The best way to understand whet trats are and how to use them is to look at them for what they essentially are: language assisted copy and paste.

*Cách tốt nhất để hiểu các đặc điểm là gì và cách sử dụng chúng là xem chúng về bản chất của chúng là gì: sao chép và dán có hỗ trợ ngôn ngữ.*

## Namespace

- Solve conflict class name.

By saying "classes" I mean:

- Classes
- Interfaces
- Abstract classes
- Traits

## Autoload

- spl_autoload_register is main function to do autoload classes.

In php, to implement autoload class we use function name: "spl_autoload_register" to require the php files.


- Composer use the same function `spl_autoload_register` to make autoload.