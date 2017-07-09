# Back-end Developer Test

### Technical Used

  * PHP `5.6`

### Summary

This command line application install via composer and using one dependcy called `"symfony/console": "~2.0"`.
There is no plugin used in this application. it looks quite simple but can be extended to be more useful to deal with github api.


### Install
* clone this repository or downlaod to the directory you prefer.
* using console (cmd for window) nevigate to the directory of this project
* install via composer `composer install` command
* type cammand line provide to see result
* have fun ^_^


### Command 

```
php cb show <argument>
```
For example, using `php cb show shampoo` as an input will output result in Output a line for each result, in the `{language}: {count}` format.
and After the results, on a separate line, output the total number of search results in the format: `=> {total_count} total result(s) 

```
JavaScript: 6
C#: 2
Emacs Lisp: 1
Jupyter Notebook: 1
HTML: 1
Python: 1
CMake: 1
Go: 1
TypeScript: 1
PHP: 1
=> 29 total result(s) found
```
### Extra Time

  ```
  php cb render <argument>
  ```

will show result as same as `php cb show shampoo` but in table format. e.g.

```
+------------------+--------+
| Language         | Number |
+------------------+--------+
| Python           | 3      |
| CoffeeScript     | 1      |
| Java             | 1      |
| Smalltalk        | 1      |
| JavaScript       | 11     |
| Emacs Lisp       | 1      |
| C++              | 1      |
|                  | 23     |
| Ruby             | 4      |
| ColdFusion       | 1      |
| HTML             | 4      |
| Go               | 1      |
| CSS              | 1      |
| TypeScript       | 1      |
| Assembly         | 1      |
| PHP              | 2      |
| Jupyter Notebook | 1      |
| C#               | 2      |
| Shell            | 1      |
| CMake            | 1      |
+------------------+--------+
=> 62 result(s) found

```