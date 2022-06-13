### Installation manual

- copy .env.example .env
- docker-compose build
- docker-compose up -d
- docker-compose exec app composer install
- docker-compose exec app php artisan key:generate
- docker-compose exec app php artisan migrate --seed
- open browser and run http://localhost:8000

### Endpoints

- `/docs` - OpenApi 3 documentation
- `/api/bookings/{room}` - Booking creation
