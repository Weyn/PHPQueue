PHPQueue
========

Queue build on two stacks in PHP.

To test queue run tests form test folder using PHPUnit ver. 3.6.10


Stack
-----
Stack is build using standard php functions operating on array.

I use [] annotation to push element to stack, because there is no overhead of calling a function, like can happen while calling array_push inserting only one element.
array_pop() returns data with complexity O(1) using internal pointers.

Queue
-----
Queue is build using two Stacks,

One is used to push new elements and second is used to reverse elements before return operation.

Enqueue method complexity is O(1);

Dequeue

The WCS for dequeue method is when whole output stack is empty and input stack have all elements.

Then we need to loop throw whole input stack and pop elements to output stack.
Complexity of this operation is O(n), because one loop cost n and array_pop costs is O(1).


