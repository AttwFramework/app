AttwFramework skeleton application
=
[![Latest Unstable Version](https://poser.pugx.org/attwframework/app/v/unstable.png)](//packagist.org/packages/attwframework/app) [![Total Downloads](https://poser.pugx.org/attwframework/app/downloads.png)](https://packagist.org/packages/attwframework/app) [![License](https://poser.pugx.org/attwframework/app/license.png)](https://packagist.org/packages/attwframework/app)

AttwFramework is a MVC micro framework to simple projects developments.

* [Website](http://attwframework.github.io)
* [Documentation](http://github.com/AttwFramework/Documentation)
* [Creator](http://github.com/gabrieljmj)

##Download
###Composer
With composer, you don't need to download the framework core code. It already comes included.

1. Download the composer [clicking here](https://getcomposer.org/download).
2. Run on terminal: ```php composer.phar create-project -s dev attwframework/app [application_name]```
or via global composer: ```composer create-project -s dev attwframework/app [application_name]```
3. After, precautionary, run ```php composer.phar install``` or ```composer install``` in application root.

###Download the zip file
To download the zip file, [click here](https://github.com/AttwFramework/app/archive/master.zip).

##Initial configuration
###Directories
####Apart framework core code
If you downloaded the framework core code apart, indicate the directory on index.php of app folder, defining a const as ```ATTW_FOLDER```.
```php
define( 'ATTW_FOLDER', realpath( APP_ROOT . DS . '..' . DS . 'framework' ) )
```
