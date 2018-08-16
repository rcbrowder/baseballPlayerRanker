# Fantasy Baseball Player Ranker


The website will let users select specific statistical categories and use up-to-date live game statistics to rank every professional baseball player based on net z-scores from those categories.

#### [__Demo site__](http://playerranker.herokuapp.com/)

## Getting Started

### Prerequisites

npm:
```json
"devDependencies": {
  "axios": "^0.18",
  "bootstrap": "^4.1.0",
  "cross-env": "^5.1",
  "jquery": "^3.2",
  "laravel-mix": "^2.0",
  "lodash": "^4.17.4",
  "popper.js": "^1.12",
  "pretty-checkbox": "^3.0.3",
  "slideout": "^1.0.1",
  "vue": "^2.5.7"
}
```

composer:
```json
"require": {
    "php": "^7.1.3",
    "fideloper/proxy": "^4.0",
    "laravel/framework": "5.6.*",
    "laravel/tinker": "^1.0"
},
"require-dev": {
    "filp/whoops": "^2.0",
    "fzaninotto/faker": "^1.4",
    "mockery/mockery": "^1.0",
    "nunomaduro/collision": "^2.0",
    "phpunit/phpunit": "^7.0"
```

### Installation

1. Download or clone the repo.
2. On the command line navigate to the project directory.
3. Enter `composer install`, followed by `npm install`, and finally `npm run dev`. This will install all of the project's dependancies.
4. Enter `php artisan serve` to start the server.
5. Open your browser and navigate to `localhost:8000`.

## Built With

* [Laravel](https://laravel.com/) - PHP framework
* [Vue.js](https://vuejs.org/) - Javascript framework
* [Bootstrap](https://getbootstrap.com/) - Frontend framework
* [npm](https://www.npmjs.com/) - Dependency management

## Authors

* Chris Browder - *Awesome Inc. Web Developer Bootcamp* - **Creator**

## Acknowledgments

* Janine Hempy and Matthew Gidcomb at the Awesome Inc. Web Developer Bootcamp. Thanks for teaching us everything we know. You're welcome for making you look good.
