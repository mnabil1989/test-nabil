## Booking Package

it's a booking package that can be used as an API and on the voyager admin panel as well.

### How to install the package

just run the following commands in order:

- publish the tables by running: `php artisan migrate`
- seed the tables and publish the booking module into voyager admin panel by running: `php artisan db:seed --class=Andalusia\\Booking\\Database\\Seeds\\DatabaseSeeder`

### License

The package licensed under the [MIT license](https://opensource.org/licenses/MIT).
