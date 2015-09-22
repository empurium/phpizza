phpizza
=======

A Symfony project created on September 19, 2015, 7:27 pm.


## Get the code

* `git clone git@github.com:empurium/phpizza.git`

* `cd phpizza/`

* `composer update`


## Set up the database

* Configure connection information in your `app/config/parameters.yml` (or during `composer update`)

* You may have to grant privileges to your SQL user:
`GRANT all privileges on phpizza.* to phpizza@localhost;`
`SET password for phpizza@localhost = password('super283strong');`
`flush privileges;`

* Create the database with `php app/console doctrine:database:create`

* Migrate to the latest structure with `php app/console doctrine:migrations:migrate`
