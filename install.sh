#!/bin/bash
composer update
mkdir view/cache
chmod 777 view/cache
cp example.env .env
cp composer.example.json composer.json
cd controller/public_html
cp example.htaccess .htaccess