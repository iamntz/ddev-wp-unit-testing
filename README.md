# What's this?

Helps you set up unit testing within WordPress ecosystem. It will install all the required tools, so you're ready to go.

The directory structure should be as follows:

```
.ddev/
tests/
   |-unit
   |-integration
   |-phpunit.xml
composer.json
wp-admin/
wp-content/
wp-*
```

# Install steps:

1. `ddev add-on get https://github.com/iamntz/ddev-wp-unit-testing/tarball/master`
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