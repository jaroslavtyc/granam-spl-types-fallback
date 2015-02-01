##Coverage
Only the SPL string and SPL type (generic) are covered by this library.

###Purpose
For projects where native [PHP SPL types](http://php.net/manual/en/book.spl-types.php)
in [version 0.4](http://pecl.php.net/package-changelog.php?package=SPL_Types&release=0.4.0) are required,
but project hosting does not allow custom PHP extensions.

###Idea
This library copies [behaviour](https://github.com/jaroslavtyc/granam-native-spl-type-behaviour-investigation) of the native PHP extension.
As close as possible.
That is achieved by running (almost) the same tests as on the native code.

( *Developer note: the fastest way to disable SPL types extension on Linux Ubuntu and its derivatives is by*
```bash
sudo php5dismod spl_types
```
)
