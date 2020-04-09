## Survey Package

it's a survey package that can be used as an API and on the voyager admin panel as well.

### How to install the package

just run the following commands in order:

- publish the tables by running: `php artisan migrate`
- seed the tables and publish the survey module into voyager admin panel by running: `php artisan db:seed --class=Andalusia\\Survey\\Database\\Seeds\\DatabaseSeeder`

### Workflow

the process to follow to use the package.

#### Admin Panel

there is a survey module in the admin panel in which it has 3 sections in it (surveys - questions - answers) and you have to follow the following instructions respectively in order for you to create a survey in the admin panel.

- `Surveys Section` in this section you can create the configuration for the survey. you have to go to this section first and create the survey.

- `Questions Section` this is the section in which you can use to create questions. after creating the survey configuration you now need to add questions to the created survey.

- `Survey Section` finally you have to add the answers for each question in the previous step.

#### API

mainly the API will be used to submit the users answers but if you want to create surveys you will have to follow the same process as explained in the `Admin Panel` above.

please note that this documentation only explains the process to follow when consuming the API and in the API documentation everything is explained.

to create a survey, consume the following endpoints in order:

- `surveys`
- `surveys_questions`
- `surveys_answers`

to submit the user answers, consume the following endpoints in order:

- `surveys_users_info` in this endpoint you are submitting the user info like his/her email.
- `surveys_users_answers` in this endpoint you are submitting the user answers.

### License

The package licensed under the [MIT license](https://opensource.org/licenses/MIT).