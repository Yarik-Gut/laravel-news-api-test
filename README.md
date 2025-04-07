git clone https://github.com/your-username/laravel-news-api.git
cd laravel-news-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
