<?php
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();
        \DB::table('categories')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 100,
                    'name' => '招聘',
                    'slug' => 'zhao-pin',
                    'description' => 'PHPHub 是国内最大 of  PHP & Laravel 社区，招聘、求职、外包等相关 of topic，都可以在此主题underrelease 。<br>请遵照 <a href="https://laravel-china.org/topics/817">PHPHub 招聘贴release 规范</a>，不遵循规范，会被视为对user of 不尊重，operation员会做沉贴操作，沉贴后user基本上看不到帖子。符合规范，我们会为topic加精并推荐到网站首页、手机端首页、精华帖周报邮件、<a href="http://weibo.com/laravelnews">Laravel information微博</a>。',
                    'created_at' => '2016-07-03 10:00:00',
                    'updated_at' => '2016-07-03 10:00:00',
                    'deleted_at' => null,
                ),
            1 =>
                array(
                    'id' => 3,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 97,
                    'name' => '公告',
                    'slug' => 'gong-gao',
                    'description' => '社区公告，小朋友不要做坏事哦。',
                    'created_at' => '2016-07-03 10:00:00',
                    'updated_at' => '2016-07-03 10:00:00',
                    'deleted_at' => null,
                ),
            2 =>
                array(
                    'id' => 4,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 99,
                    'name' => 'Q & A',
                    'slug' => 'wen-da',
                    'description' => 'Novice Q & A, please read carefully <a href="https://laravel-china.org/topics/535">关于《提问 of 智慧》</a>，质量太低 of 问题，不遵循规范，会被视为对user of 不尊重，operation员会做沉贴操作，沉贴后user基本上看不到帖子。排版清晰，信息完整 of ，我们会为topic加精，加精后 of 帖子将会被推荐到网站首页、手机端首页、精华帖周报邮件、<a href="http://weibo.com/laravelnews">Laravel information微博</a>。',
                    'created_at' => '2016-07-03 10:00:00',
                    'updated_at' => '2016-07-03 10:00:00',
                    'deleted_at' => null,
                ),
            3 =>
                array(
                    'id' => 5,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 98,
                    'name' => '分享',
                    'slug' => 'fen-xiang',
                    'description' => '分享创造，分享知识，分享灵感，分享创意，分享美好 of 东西。排版清晰，内容精良 of 话，我们会为topic加精，加精后 of 帖子将会被推荐到网站首页、手机端首页、精华帖周报邮件、<a href="http://weibo.com/laravelnews">Laravel information微博</a>上。',
                    'created_at' => '2016-07-03 10:00:00',
                    'updated_at' => '2016-07-03 10:00:00',
                    'deleted_at' => null,
                ),
            4 =>
                array(
                    'id' => 6,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 98,
                    'name' => 'Tutorial',
                    'slug' => 'tutorial',
                    'description' => 'Tutorialarticle请存放在此categoryunder，转载article请注明「转载于」声明。',
                    'created_at' => '2016-07-03 10:00:00',
                    'updated_at' => '2016-07-03 10:00:00',
                    'deleted_at' => null,
                ),
            5 =>
                array(
                    'id' => 8,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 98,
                    'name' => '专栏',
                    'slug' => 'blog',
                    'description' => 'user自己创建 of 专栏信息。',
                    'created_at' => '2016-07-03 10:00:00',
                    'updated_at' => '2016-07-03 10:00:00',
                    'deleted_at' => null,
                ),
            6 =>
                array(
                    'id' => 9,
                    'parent_id' => 0,
                    'post_count' => 0,
                    'weight' => 98,
                    'name' => 'life',
                    'slug' => 'life',
                    'description' => '分享life',
                    'created_at' => '2016-07-03 10:00:00',
                    'updated_at' => '2016-07-03 10:00:00',
                    'deleted_at' => null,
                ),
        ));
    }
}
