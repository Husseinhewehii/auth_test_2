<?php
namespace Database\Seeders;
use App\Constants\UserStatus;
use App\Constants\UserTypes;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'type'=> UserTypes::ADMIN,
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'phone' => '01234567890',
            'status' => UserStatus::ACTIVE,
            'password' =>Hash::make('test1234'),
        ]);
        // factory(User::class, 10)->create();


//        factory(App\Models\User::class, 10)->create()->each(function ($users) {
//            $users->save(factory(App\Models\User::class)->make()->toArray());
//        });



//        DB::table('users')->insert([
//            'name' => Str::random(10),
//            'email' => Str::random(10).'@gmail.com',
//            'password' => Hash::make('password')
//        ]);
    }
}
