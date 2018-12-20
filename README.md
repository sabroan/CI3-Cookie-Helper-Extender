# CodeIgniter 3 Cookie Helper Extender
Add additional functions for working with cookies.

## Install
Copy **MY_cookie_helper.php** to */application/helpers/*, and load helper trought CodeIgniter [Loader](https://www.codeigniter.com/user_guide/libraries/loader.html) class.
```php
$this->load->helper('cookie');
```
*Note:* In case if you `subclass_prefix` was changed in */application/config/config.php*, filename prefix **MY_** should be renamed accordingly.

## Functions
### Check if cookie is enabled.
This function determinate if cookie is enabled in client browser, by counting currently set cookies.
If nothing was found, test cookie will be set.
```php
is_cookie_enabled();
```

*Note:* CodeIgniter [URL](https://www.codeigniter.com/user_guide/helpers/url_helper.html) helper and [Input](https://www.codeigniter.com/user_guide/libraries/input.html) class is used in this function.
