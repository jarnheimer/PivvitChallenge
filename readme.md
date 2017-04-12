# Pivvit code challenge repo

## Deploy

- `cd ~`
- `git clone https://github.com/zettamax/PivvitChallenge.git`
- `cd PivvitChallenge` 
- `composer install`
- `chmod -R 777 storage/ bootstrap/cache/` yep, it's a little messy
- `cp .env.example .env; php artisan key:generate`
- set DB credentials env file: `nano .env`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan serve`
- open [127.0.0.1:8000](http://127.0.0.1:8000)
- done!