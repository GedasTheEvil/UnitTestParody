# Unit Test Assertion

A learning Example meant to teach a friend of mine about unit testing.

recommended way to run the test in the source dir:
```bash
 php -S localhost:8000 -t ./
```

and then opening browser at the url `http://localhost:8000/run-test.php`

# Profiling

A minimal profiler (that requires changes to the code) was added to demonstrate why the optimized version is faster
just compare the results of `http://localhost:8000/profile-the-optimized-version.php` 
and `http://localhost:8000/profile-the-slow-version.php`

## Profiling notes
Total operation time is calculated `c * n` where *c* is the time taken per operation and *n* is the number of 
operation. Many people would start reducing the *c*, but that would not be event visible for algorithms of high 
complexities.

As in this example the complexity of the slow fibonacci is around (2^(n * 0.6)) in other words O(2^(n/2))
 and the optimized version complexity is around 2n, in other words O(n). 
