# madzaTwitterFeed
Get tweets from twitter and store it in DB.

## Installation and Config
* There is config file in `config` folder, please edit `base_dir`, `base_url`, `db` and `twitter`.
* Create new DB in MySQL and import `db.sql`
* In terminal, type in: composer dump-autoload
* Download CA Certification and put it in `/twitteroauth/src/`


## Requirements
* PHP
* MySQL
* Installed Composer

## Helpful links
* [Demo page](http://madza.rs/demo/madzaTwitterFeed/)
* Twitter Dev page for getting [user timeline](https://dev.twitter.com/rest/reference/get/statuses/user_timeline)
* CA certificate [Cacert.pem](https://curl.haxx.se/ca/cacert.pem)

## License
madzaTwitterFeed is released under the very permissive MIT license.

## Credits
Written by Nemanja M. (nemanja at madza dot rs)