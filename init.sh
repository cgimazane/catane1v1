#!/bin/sh

sudo setfacl -R -m u:www-data:rwx -m u:$USER:rwx var/cache var/logs var/sessions
sudo setfacl -dR -m u:www-data:rwx -m u:$USER:rwx var/cache var/logs var/sessions

sudo chown -R $USER:www-data web
