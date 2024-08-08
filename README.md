# Simple Laravel API
## Prerequire
You need have installed docker for easy setup using laravel sail

## Setup

1. Clone the repository:
```bash
git clone <repository-url>
cd simple-api
```

2. Install dependencies:
```bash
composer install
```
Configure your .env file with your database settings.

3. Run migrations:
```bash
php artisan migrate
```

4. Start the queue worker:
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
