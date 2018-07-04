<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makevisible(['password','remember_token'])->toArray());
        $user = User::find(1);
        $user->name = 'winter';
        $user->email = '3541700767@qq.com';
        $user->password = bcrypt('password');
        $user->activated = true;
        $user->is_admin = true;
        $user->save(); 
    }
}
