---

! [Macbook] (https://cloud.githubusercontent.com/assets/324764/18414545/d875e012-77ff-11e6-9249-0b56a6460cb8.png)

## Project Overview

* Product Name: PHPHub5
* Project code: PHPHub5
* Official address: https: //laravel-china.org/

[PHPHub] (https://github.com/summerblue/phphub) Laravel 5.1 version.

## Run the environment

- Nginx 1.8+
- PHP 5.6+
- Mysql 5.7+
- Redis 3.0+
- Memcached 1.4+

## Development Environment Deployment / Installation

This project code is developed using the PHP framework [Laravel 5.1] (https://doc.laravel-china.org/docs/5.1/), and the local development environment uses [Laravel Homestead] (https://doc.laravel-china.org /docs/5.1/homestead).

The following will explain the assumption that the reader has installed Homestead. If you have not installed Homestead, you can configure it by referring to [Homestead Installation and Settings] (https://doc.laravel-china.org/docs/5.1/homestead#installation-and-setup).

### Basic installation

#### 1. Clone the source code

Clone source code to local:

    > Git clone https://github.com/summerblue/phphub5.git

#### 2. Configure the local Homestead environment

1). Run the following command to edit the Homestead.yaml file:

`` `Shell
Homestead edit
`` ``

2). Add the corresponding changes, as follows:

`` ``
Folders:
    - map: ~ / my-path / phphub5 / # your local project directory address
      To: / home / vagrant / phphub5
Sites:
    - map: phphub5.app
      To: / home / vagrant / phphub5 / public

Databases:
    - phphub5
`` ``

3) Apply changes

After the modification is complete, save the following command and apply the configuration information to modify:

`` `Shell
Homestead provision
`` ``

> Note: Sometimes you need to reboot to see the application. Run `homestead halt` and then` homestead up` to reboot.


#### 3. Generate the configuration file

    > Cp .env.example .env


#### 4. Install the extension package dependencies

    > Composer install



#### 5. Use the install command

Inside the virtual machine:

`` `Shell
Php artisan est:install
`` ``

> For more information, please refer to ESTInstallCommand

#### 6. Configure the hosts file

Host:

    Echo "192.168.10.10 phphub5.app" | sudo tee -a / etc / hosts

### Front-end tool set installation

> Code comes with compiled front-end code, if you do not want to develop front-end style, you do not need to configure the front-end toolset, you can directly skip the `link entry` section.

1). Install node.js

Go directly to the official website [https://nodejs.org/en/](https://nodejs.org/en/) download and install the latest version.

2). Install Gulp

`` `Shell
Npm install --global gulp
`` ``

3). Install Laravel Elixir

`` `Shell
Npm install
`` ``

4). Direct Gulp compiles front end content

`` `Shell
Gulp
`` ``

5). Monitor changes and automatically compile

`` `Shell
Gulp watch
`` ``

### link entry

> Please modify the `.env` file to` APP_ENV = local` and `APP_DEBUG = true`.

* Home Address: http://phphub5.app/
* Management background: http://phphub5.app/admin

In the development environment, direct access to the background address can log on the 1st user.

At this point, the installation is complete.

## extended package description

Expansion case. A statement of use in this project
| --- | --- | --- |
| [Infyomlabs / laravel-generator] (https://packagist.org/packages/infyomlabs/laravel-generator) | Laravel Code Generator | Development, Migration, Model, Controller are used to generate this extension. |
| [Orangehill / iseed] (https://github.com/orangehill/iseed) | Export the data in the data table as a seed | BannersTableSeeder, LinksTableSeeder, CategoriesTableSeeder, and TipsTableSeeder using this extension package. |
| [Barryvdh / laravel-debugbar] (https://github.com/barryvdh/laravel-debugbar) | Debugging Toolbar | The necessary debugging tool for development. |
| [Rap2hpoutre / laravel-logviewer] (https://github.com/rap2hpoutre/laravel-log-viewer) | Log View Tool | In the production environment, use this extension package to quickly view the Log, has permission control. |
| [Laracasts / presenter] (https://github.com/laracasts/Presenter) | Presenter mechanism | The following Model: User, Topic, Notification are used for Presenter. |
| [League / html-to-markdown] (https://github.com/thephpleague/html-to-markdown) | convert HTML to Markdown | user post, reply to post using this extension package. |
| [Erusev / parsedown] (https://github.com/erusev/parsedown) | convert Markdown to HTML | user post, reply to post using this extension package. |
| [Laravel / socialite] (https://github.com/laravel/socialite) | The official social sign-on component | GitHub login logic uses this extension package. |
| [NauxLiu / auto-correct] (https://github.com/NauxLiu/auto-correct) | Automatically add a reasonable space between Chinese and English to correct the case of special nouns | When users post with this extension package to filter the title The |
| [Intervention / image] (https://github.com/Intervention/image) | Image Processing Library | When using post and reply to posts, the image upload logic uses this extension package. |
| [Zizaco / entrust] (https://github.com/Zizaco/entrust.git) | User Group Permissions System | Permissions for the entire station The system is based on this extension package development. |
The following model: User, Topic, Reply, Category, Banner use this extension package to delete the log. | [VentureCraft / revisionable] (https://github.com/VentureCraft/revisionable) | Record Model Change Log | |
| [Mews / purifier] (https://github.com/mewebstudio/Purifier) ​​| HTML whitelist filter | user post, reply to prevent XSS filtering. |
| [Oumen / sitemap] (https://github.com/RoumenDamianoff/laravel-sitemap) | Sitemap Generating Tool | The sitemap for this project is generated using this extension. |
| [Spatie / laravel-backup] (https://github.com/spatie/laravel-backup) | Database backup solution | The database backup for this project is done using this extension package. |
| [Summerblue / administrator] (https://github.com/summerblue/administrator) | Manage Background Solutions | The background of this project is developed using this extension. |
| [Laracasts / flash] (https://packagist.org/packages/laracasts/flash) | simple flash messages | user login successful, posting successful tips to use this extension package development |


## Customize the list of Artisan commands

Command | description |
| --- | --- |
| Est: install | install the command, only support the development environment to run, in the initial installation is necessary to run. |
| Est: reinstall | Reload command, only support the development environment to run, call this command will reset the database, reset the user identity. |

## Scheduled Tasks

The scheduled tasks for this project are performed by Laravel's [Task Scheduler] (https://doc.laravel-china.org/docs/5.1/scheduling).

Command | description | call |
| --- | --- | --- |
| `Backup: run --only - db` | database backup, every 4 hours running, belonging to [spatie / laravel-backup] (https://github.com/spatie/laravel-backup) logic | php artisan backup : Run --only-db |
| `Backup: clean` | clean up expired database backup, run every day 1:20, belongs to [spatie / laravel-backup] (https://github.com/spatie/laravel-backup) logic | php artisan backup: Clean |


## Code Generator Log

This project uses [infyomlabs / laravel-generator] (https://packagist.org/packages/infyomlabs/laravel-generator) to quickly build projects that record these logs for the convenience of subsequent development.

`` `Shell

Php artisan make: scaffold Appends --schema = "content: text, topic_id: integer: unsigned: default (0): index"

Php artisan make: scaffold Attentions --schema = "topic_id: integer: unsigned: default (0): index, user_id: integer: unsigned: default (0): index"

Php artisan make: scaffold Links --schema = "title: string: index, link: string: index, cover: text: nullable"

(0): index, is_block: tinyInteger: unsigned: default (0): index, is_block: Vote_count: integer: unsigned: default (0): index, body: text, body_original: text: nullable "

(0), answer_count: tinyInteger: unsigned: default (0), reply_count: integer: unsigned: default (0), php (s) Image_count: integer: unsigned: default (0) "

Php artisan make: scaffold tips --schema = "body: text: nullable"

Php artisan make: scaffold Topics --schema = "title: string: index, body: text, user_id: tinyInteger: unsigned: default (0), category_id: integer: unsigned: default (0), reply_count: integer: unsigned: default (0), last_reply_user_id: integer: unsigned: default (0), order: integer: unsigned: default (0), is_excellent: (0), view_count: integer: unsigned: default (0), vote_count: integer: TinyInteger: unsigned: default (0), is_wiki: tinyInteger: unsigned: default (0), is_blocked: tinyInteger: unsigned: default (0), body_original: text: nullable, excerpt: text: nullable "

Vtable_id: integer: unsigned: default (0), votable_type: string: index, is: string: index "

Php artisan make: scaffold Users --schema = "github_id: integer: unsigned: default (0): index, github_url: string: index, email: string: index: index, name: string: index: index"

Vtable_id: integer: unsigned: default (0), votable_type: string: index, is: string: index "

Php artisan make: scaffold Banners --schema = "position: string: index, order: integer: unsigned: default (0): index, image_url: string, title: string: index,

Php (s): index, type: string: index, body: text: nullable "
`` ``

## License

> Sites built with PHPHub5 or modified based on PHPHub5 source code ** must be added to `Powered by PHPHub` in the footer and must be linked to` https: // laravel-china.org`. ** must be in the page on each title with `Powered by PHPHub` words.

In compliance with the above rules, you may enjoy the same authorization as the MIT Agreement.

Or you can contact `cj @ estgroupe.com` to purchase a commercial license, the business license allows you to remove the footer and title of the` Powered by PHPHub` words.