<?php
use App\Models\Role;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    public function run()
    {
        $password = bcrypt('secret');
        $users = factory(Staff::class)->times(490)->make()->each(function ($user, $i) use ($password) {
            if ($i == 0) {
                $user->name = 'admin';
                $user->email = 'admin@estgroupe.com';
                $user->github_name = 'admin';
                $user->verified = 1;
            }
            $user->password = $password;
            $user->github_id = $i + 1;
        });
        Staff::insert($users->toArray());
        $hall_of_fame = Role::addRole('HallOfFame', 'HallOfFame');
        $users = Staff::all();
        foreach ($users as $key => $user) {
            $user->attachRole($hall_of_fame);
        }

    }
}
