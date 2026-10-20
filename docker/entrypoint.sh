#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ ! -d vendor ]; then
    composer install --no-interaction --prefer-dist
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --ansi --force
fi

mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache

echo "Aguardando o MySQL..."
until php -r 'try { new PDO("mysql:host=" . getenv("DB_HOST") . ";port=3306;dbname=" . getenv("DB_DATABASE"), getenv("DB_USERNAME"), getenv("DB_PASSWORD")); } catch (Throwable $e) { exit(1); }'; do
    sleep 2
done

php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port=80
