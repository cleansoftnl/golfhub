<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        //'UsersTableSeeder',
        //'StaffTableSeeder',
        //'LinksTableSeeder',
        //'CategoriesTableSeeder',
        //'TopicsTableSeeder',
        //'RepliesTableSeeder',
        //'BannersTableSeeder',
        /**///'FollowersTableSeeder',/*Does not work*/
        //'ActiveUsersTableSeeder',
        //'HotTopicsTableSeeder',
        //'SitesTableSeeder',
        //'OauthClientsTableSeeder',
    ];

    public function run()
    {
        //insanity_check();
        //Model::unguard();
        foreach ($this->seeders as $seedClass) {
            $this->call($seedClass);
        }
        //Model::reguard();
    }
}
