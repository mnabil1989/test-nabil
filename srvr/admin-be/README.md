## Installation

git the clone:

    $ git clone https://#@bitbucket.org/andalusia_remote/admin-be.git -b #
Next we will get in on the file to manage :

    $ cd admin-be
    
Next we will install Composer:

    $ composer install 
Next we will Copy the .env.example to file of .env :

    $ cp .env.example .env 

Next make sure to create a new database and add your database credentials to your .env file:

    DB_HOST=localhost
    DB_DATABASE=homestead
    DB_USERNAME=root
    DB_PASSWORD=secret 
 Next we will generate the key :
    
    $ php artisan key:generate 
generate Jwt Package :

    $ php artisan jwt:secret 
     
 generate tables with Dummy Data :
    
    $ php artisan migrate:refresh --seed

