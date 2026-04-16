#!/bin/sh
chmod -R 777 /var/www/html/protected/runtime
chmod -R 777 /var/www/html/assets
exec apache2-foreground
