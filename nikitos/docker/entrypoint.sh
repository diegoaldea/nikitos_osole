#!/bin/sh
set -e

# Apache aborta si detecta mas de un MPM (AH00534). Se fuerza aca, en el
# arranque, para no depender del estado con el que quedo la imagen.
rm -f /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf
ln -sf ../mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load
ln -sf ../mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf
echo "[entrypoint] MPM activos: $(ls /etc/apache2/mods-enabled/ | grep mpm | tr '\n' ' ')"
echo "[entrypoint] LoadModule mpm fuera de mods-enabled:"
grep -rn "LoadModule mpm" /etc/apache2/ /usr/local/etc/ 2>/dev/null || echo "  (ninguno)"

# Railway inyecta $PORT en runtime; Apache tiene que escuchar ahí.
PORT="${PORT:-8080}"
sed -ri "s/^Listen [0-9]+/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

php artisan storage:link || true
php artisan migrate --force

php artisan config:cache
php artisan route:cache
php artisan view:cache

exec apache2-foreground
