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

When passing the endpoint, you don't need to include the ``yourls-api.php`` portion of the API URL.  Simply provide the domain where your installation of YOURLS lives, such as ``http://myyours.com``.