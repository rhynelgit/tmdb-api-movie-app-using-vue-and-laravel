<h2 align="center">Laravel Coding Challenge For Movie Rest API's</h2>

This laravel coding challenge for movie rest API's is where users can get a list of popular movies fetched 
from <a href="https://www.themoviedb.org" target="_blank">The Movie Database</a> API.

It will display the list of the movie with movie title, poster, date released, and view average with pagination. 
It is clickable for users to view the details of each movie. Users can read the overview of the story and other stuff.

![Pagination](https://user-images.githubusercontent.com/80267771/111573844-3ff23d80-87e6-11eb-97ef-0b6d22798bc0.png)

This project is wriiten in PHP with Laravel framework and the view layer for MVC is using Vue.js Framework.

For requesting API to another website I use GuzzleHttp package to Laravel.

## Frameworks and Libraries
Laravel 8.12, Vue 3, Vuex, Vue Router, Axios

## Style
SASS - Sass is the most mature, stable, and powerful professional grade CSS extension language in the world. <br>
SMACSS - Scalable and Modular Architecture for CSS.

## Requirements
- PHP >= 7.2 or 8.0

## Installation
First you must have a composer installed in your pc then run this in CLI in the project directory and type

```bash
composer install
```

If you want to rewrite the frontend code type

```bash
npm i
npm run watch
```

## Run the server

```bash
php artisan serve
```

## Tests

```bash
vendor/bin/phpunit
```
