# Simple Laravel API with Job Queue, Database, and Event Handling

## Prerequire

You need have installed docker for easy setup using laravel sail

## Setup

1. Clone the repository:

```bash
git clone git@github.com:havryshkevych/testOneDatatec.git
cd testOneDatatec
```

2. Install dependencies using Docker:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install
```

3. Configure your `.env` file with your database settings,  
   or simple copy `.env.example -> .env`


4. Run migrations:

```bash
php artisan migrate
```

5. Start the queue worker:

```bash
php artisan queue:work
```

### Testing the API

Send a POST request to `/api/submit` with the following JSON payload:

```json
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}
```

### Running Tests

Run the tests:

```bash
 php artisan test
 ```
