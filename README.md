# Back-end Developer Test

This is a simple (and hopefully fun) exercise, used to evaluate your ability to design and build a solution to satisfy a set of requirements. Your solution must come in the form of a **command-line** application (see below for details), and shouldn't take longer than an hour to complete.

You can pick any of **PHP**, **NodeJS** or **Scala** to build your app. You are only **required** to submit a solution in **one** of those languages, but for plus points you are welcome to complete the test in two, or even all three languages.


### Technical Requirements

Your solution must work with the following platforms (depending on your language of choice):

  * PHP `5.6`
  * NodeJS `4.2`
  * Scala `2.11` and Oracle JDK `8`

It will be tested on Ubuntu `14.04`, but that should make no difference to your solution (any Linux distro will do).

Besides the platform restriction above, you are welcome to use any libraries (or none at all) to come up with your solution.


### Functional Requirements

The command line application **must**:

  1. Take a single argument specifying the search term, and error out if one is not provided
  2. Using the [Open Movie Database](http://www.omdbapi.com) API as a starting point, find **all movies** that have a title containing
     the given search term, and also have a **Poster** available. There's **no need** to actually retrieve the high resolution poster
     image using the separate (paid) Poster API.
  3. Sort the results by **Year** ascending
  4. Output one line for each result, in the following format: `{title} [{year}] - {poster_url}`
  5. After the results, on a separate line, output the number of results in the format: `=> {count} result(s) found`


### Evaluation

While your submission must work for any arbitrary search term, it will be tested with the following:

  * `goat`
  * `american pie`
  * `black books`
