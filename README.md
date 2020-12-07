#  Xdebug enabled laravel artisan serve 

` artisan serve` can't accept Xdebug option.   becaucse ` artisan serve` has no way to pass `-d` options.
This package add artisan command ` artisan serve:debug`.

 

## Installation 
```
./composer.phar  config repositories.github-takuya vcs  https://github.com/takuya/artisan_serve_debug
./composer.phar require --dev -n takuya/artisan_serve_debug:dev-main
```

## start builtin-WebServer with debug
```
php artisan serve:debug
```


## Another Way to enable xdebug 

This package shipped with ` artisan serve:use_ini` command.
This command enable to load addtional `.ini` at project root.

```
cd $laravel_procject
touch .user.ini
php artisan serve:use_ini
```

