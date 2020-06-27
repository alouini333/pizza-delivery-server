<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'John';
        $user->last_name = 'Doe';
        $user->email = 'John.Doe@example.com';
        $user->password = 'secret';
        $user->gender = 'male';
        $user->phone = '1122334455';
        $user->save();

        $user = new User;
        $user->name = 'Florian';
        $user->last_name = 'Gerste';
        $user->email = 'Florian.Gerste@example.com';
        $user->password = 'secret';
        $user->gender = 'male';
        $user->phone = '1122334455';
        $user->address = 'some address';
        $user->save();

        $user = new User;
        $user->name = 'Klaudia';
        $user->last_name = 'Wolf';
        $user->email = 'Klaudia.Wolf@example.com';
        $user->password = 'secret';
        $user->gender = 'female';
        $user->phone = '1122334455';
        $user->address = 'some address';
        $user->save();

    }
}
