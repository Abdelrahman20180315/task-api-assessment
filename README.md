Task API Assessment
 This repository contains a RESTful API endpoint for managing tasks in a project management application, built with Laravel 11 as part of the Senior Backend Developer (PHP/Laravel) assessment.

 ## Features
 - **API Endpoint**: `POST /api/tasks` to create tasks with attributes: `id`, `title`, `description`, `status`, `priority`, `created_at`, `updated_at`.
 - **Validation**: Ensures `title` is required, `status` is one of ["To Do", "In Progress", "Completed"], and `priority` is one of ["High", "Medium", "Low"].
 - **Error Handling**: Returns appropriate HTTP status codes (201, 422, 500) with JSON responses.
 - **Unit Tests**: Includes PHPUnit tests for success and validation error cases.
 - **Optimizations**: Composite index on `status` and `priority`, Redis caching, and rate limiting for performance.

 ## Setup Instructions
 1. Clone the repository: `git clone https://github.com/your-username/task-api-assessment.git`
 2. Install dependencies: `composer install`
 3. Copy `.env.example` to `.env` and configure MySQL and Redis:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=task_api
    DB_USERNAME=root
    DB_PASSWORD=
    CACHE_DRIVER=redis
    REDIS_HOST=127.0.0.1
    REDIS_PORT=6379
    ```
 4. Run migrations: `php artisan migrate`
 5. Start the server: `php artisan serve`
 6. Test the API using Postman or cURL:
    ```bash
    curl -X POST http://127.0.0.1:8000/api/tasks \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"Create Profile","description":"Create admin profile","status":"To Do","priority":"High"}'
    ```
 7. Run tests: `php artisan test`

 ## Time Tracking
 - API Design: 20 minutes
 - Implementation: 1 hour 15 minutes (including 25 minutes search time)
 - Database Optimization: 20 minutes (including 10 minutes search time)
 - **Total**: ~= 1 hour 55 minutes

 ## Notes
 - Built with Laravel 11, compatible with Laravel 10.
 - Redis is optional; fallback to `CACHE_DRIVER=file` if needed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
