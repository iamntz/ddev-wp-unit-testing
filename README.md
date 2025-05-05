# What's this?

Helps you set up unit testing within WordPress ecosystem. It will install all the required tools, so you're ready to go.


# Install steps:

1. `ddev add-on get https://github.com/iamntz/ddev-wp-unit-testing/archive/refs/tags/1.0.0.tar.gz`
2. add `/tests/wp-unit-testing` & `/tests/.phpunit.result.cache` to your `.gitignore`
3. add these scripts to your `composer.json` file:

```json
  "scripts": {
      "test:php": "vendor/bin/phpunit -c tests/phpunit.xml",
      "test:wp": "vendor/bin/phpunit --bootstrap tests/bootstrap-wp.php -c tests/phpunit-wp.xml",
   }
```

Run tests:

```bash
$ ddev composer run-script test:php
```
or

```bash
$ ddev composer run-script test:wp
```