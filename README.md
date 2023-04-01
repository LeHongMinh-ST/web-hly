## Requirements

- PHP >= 8.0.2

## Usage

1. Clone project. $ git clone git@gitlab.com:LeHongMinh-ST/students-fita.git
2. Create .env file, copy content from .env.example to .env file and config your database in .env:

``` bash
	DB_CONNECTION=mysql
	DB_HOST=database_server_ip
	DB_PORT=3306
	DB_DATABASE=database_name
	DB_USERNAME=username
	DB_PASSWORD=password

```

3. Run

``` bash
	$ composer install
	$ php artisan key:generate
	$ php artisan jwt:secret
	$ php artisan migrate
	$ php artisan db:seed --class=DatabaseSeeder
	$ php artisan storage:link
	$ php artisan route:clear
	$ php artisan config:clear
	
	
	$ npm install
	$ vite build
	or
	$ npm run prod
```

4. Local development server

- Run

``` bash
back-end
	$ php artisan serve
	
front-end
	$ vite
	or
	$ npm run dev
```

- In your browser, go to [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login) to run your project.
- Login with default admin account email: admin@gmail.com and password: 12345678
