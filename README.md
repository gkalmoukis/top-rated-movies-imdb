## Local installation in Linux environment

### Clone the repository
```
git clone https://gkalmoukis@bitbucket.org/gkalmoukis/cooks-near-me-api.git
```

### Install dependencies
On project route directory run `composer install`.

```
cd top-rated-movies-imdb
composer install
```

### Create database
Create a new local database schema.

```
mysql -u <user> -p
CREATE DATABASE gkal_top_rated;
```


### Create environment file

Create a new new environment file.

```
cp .env.exaple .env
```

Run the `key:generate` artisan command on project root directory.

```
php artisan key:generate
```


Open `/.env` and add your mysql credentials.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gkal_top_rated
DB_USERNAME=<mysql username>
DB_PASSWORD=<mysql password>
```

Also in `.env` add the following variables

```
IMDB_API_URL=https://imdb8.p.rapidapi.com
RAPIDAPI_KEY=<your api key>
```

### Migrate Database 

Create database schema 
```
php artisan migrate
```

Then run the custom artisan command `imdb:fetch`.
```
php artisan imdb:fetch
```

### Serve
Serve the application by running the serve artisan command, on project root directory.
```
php artisan serve
```