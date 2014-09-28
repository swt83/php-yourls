# YOURLS

A PHP package for working w/ the YOURLS API.

## Install

Normal composer install.

## Usage

Call the desired method and submit the necessary fields as a single array:

```php
$result = Travis\YOURLS::shorturl(array(
    'endpoint' => 'http://mydomain.com/', // always required
    'username' => 'foo', // always required
    'password' => 'bar', // always required
    'url' => 'http://www.reallylongurlthatistoolongtouseinanypracticalway.com',
));
```

For details on what methods are avialable, check the [API](http://yourls.org/#API) documentation.

## Notes

When passing the endpoing, you don't need to include the ``yourls-api.php`` in the API URL.  Simply providing the domain where your installation of YOURLS lives will suffice.