Dependencies
------------
You need [Composer](https://getcomposer.org/doc/00-intro.md) to pull in dependencies. With Composer installed, from the top-level directory run the following:
```
$> composer install
```

Running the app
---------------
From the top-level directory, simply run the executable `bin/app`:
```
$> bin/app <N>
```
The argument *N* is a whole number, and *N* >= 1.

### Unit tests
From the top-level directory, run PHPUnit:
```
$> vendor/bin/phpunit
```

What's cool
-----------
* Simplicity of the code design and how it all came together
* Substitutability of `PrimeGen\Core` interface allowing for swapping in other prime generation algorithms.
* Separation of concerns of prime numbers collation in `PrimeGen`from that of the actual sieving/discovery in `Sieve` core.
* Sustainably generating up to first [~80K primes from sieving a number range up to 1E6](https://primes.utm.edu/howmany.html#table) with just the default/basic memory allocation - without table rendering.

Next steps when more time
-------------------------
* Explore swapping out `Sieve` core with augmented versions of the Sieve of Eratosthenes using strategies like [segmentation](http://primesieve.org/#algorithms), [wheel factorization](http://primes.utm.edu/glossary/xpage/WheelFactorization.html), or [incremental sieve](https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes#Incremental_sieve).
* Use output buffering or stream to render the primes table, especially when too wide for the console, and maybe render in repeated table segments. Might reduce memory footprint too.
* Try to derive from the allocated memory the limit for the number range `PrimeGen\Sieve` works with.
* Improve error handling to catch out-of-memory error when *N* is way above what default memory allocation can handle, and present a better message to the user.
