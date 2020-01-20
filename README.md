# Prospecting the probability

This application has been written in Laravel, while the front-end is done in React.js.

The front-end code can be accessed [here](https://github.com/Kravinskiy/test-prospecting-the-probability-frontend)

Please note, that when writing this project, I mainly focused on the back-end part, so while I tried to keep it clean,
if I was interviewing for a solely front-end role, I might do some of the things different. :-)

## Installation

1. Clone the repository
2. Clone the front-end repository as well
3. Run `composer install`
4. Run `php artisan key:generate`
5. Run `php artisan serve`
6. Follow the installation guide on the front-end repository

## Test

- To execute it, run `vendor/bin/phpunit`

## API routes

- `GET /entity_info` Gets entity info. Expects `entity_name` to be sent with the request. Will only return the first match. Full API doc can be read [here](https://app.swaggerhub.com/apis/i6643/prospectingProbability/1.0.0#/EntityInfo).

## Good to know

- I designed the application in a way I would do a larger project
- I followed the principles of Domain-Driven-Development, to allow the application to grow while maintaining code quality
- As this app's only purpose is to serve API requests, I removed the default "web" related components
- Getters and setters are used because of a personal preference. While I appreciate that they are not needed in my cases, I reckon it improves readability

## Things missing

- Exceptions should be more standardized, and be thrown in JSON format
- Most of the Abstract classes are empty, and logic is somewhat duplicated because of time constraints
- GrumPHP should be installed to git pre-commits
- Better docblocks for Laravel magic-functions 
- Use different "repository" for testing