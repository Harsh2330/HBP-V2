cd .\HBP-V2\
composer install
composer update
npm install
npm run build
php artisan key:generate

# Run the database seeder
php artisan db:seed