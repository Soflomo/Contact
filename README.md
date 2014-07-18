Soflomo Contact
===

Soflomo\Contact is an [ensemble](http://ensemble.github.com) module that provides a contact form.

Installation
---
Soflomo\Contact is available as a composer package. Currently, Soflomo\Contact is not registered on Packagist, but you can add this repository to your `composer.json` file:

```
"repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:Soflomo/Contact.git"
        }
    ],
```

Then require `soflomo/contact`. Currenly, Soflomo\Contact is in development and alpha versions are tagged. The latest alpha release is `v0.1.0-alpha1`. To get the latest version of Soflomo\Contact, require the `@alpha` version in your composer.json:

```
"require": {
    "soflomo/contact": "@alpha"
}
```

Enable the module (named `Soflomo\Contact`) in your application.config.php.

Configuration
---
Create your own configuration file in `config/autoload/` (e.g. `soflomo_contact.config.global.php`). Check the configuration from `vendor/soflomo/contact/config/module.config.php` for all the configuration options.