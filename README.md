# Getting started

## Installation

Make sure you have [PHP](https://www.php.net/downloads.php) and [Composer](https://getcomposer.org/download/) Installed On the machine.

Alternatively can be run through [Docker](https://www.docker.com/)

<br>

Clone the repository

    git clone https://github.com/janis-sijanovs/laravel-deliveries-db.git

Switch to the repo folder

    cd laravel-deliveries-db

Install all the dependencies using composer

    composer i

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
    
Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)
'--seed' will generate dummy data for the database

    php artisan migrate:fresh --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/janis-sijanovs/laravel-deliveries-db.git
    cd laravel-deliveries-db
    composer i
    cp .env.example .env
    php artisan key:generate
    php artisan migrate:fresh --seed
    php artisan serve
    
## About the Project
    
This is a Laravel application, that is used to query and display data from a database.

The database contains information about clients, their addresses, deliveries to the client, 
and routes that will be taken during the deliveries.

The application contains 5 pages:

1. Clients:

The page is split in two. On the left side, there's a table with the clients.
There are two buttons for each client. One shows addresses and the other one deliveries.

When clicking the address button, Client addresses will show up on the right side of the page.
Page not reloading when displaying addresses is a requirement, so addresses are preloaded,
and are switched with VueJS.

When clicking the deliveries button, a post request is sent, and the client deliveries page is opened.
This page cannot be accessed with a get request.

2. Deliveries:

This page is split in two too. On the left side, there's information about the client.
On the right side, there's a list of all deliveries.

3. Order Types:

The order types page displays a table with addresses, 
where both types of delivery were ordered.

4. Last Delivery:

This page displays the last order for every Address.

5. Inactive Clients

This page displays the clients, that have never ordered liquid products.

![LaravelApp](https://user-images.githubusercontent.com/101757160/175757416-2107070f-d314-4243-97cb-b97fcc28ef5b.gif)

