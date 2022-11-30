<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::truncate();
            DB::table('role_user')->truncate();


        $superadminRole = Role::where('urole','superadmin')->first();
            $adminRole  = Role::where('urole','admin')->first();
            $authorRole = Role::where('urole','author')->first();
            $officer    = Role::where('urole','officer')->first();
            $teammate   = Role::where('urole','teammate')->first();
            $salesperson = Role::where('urole','salesperson')->first();
            $userRole   = Role::where('urole','user')->first();

            $superadmin = User::create([
                'name'     => 'Shams',
                'urole'    => 'superadmin',
                'email'    => 'superadmin@admin.com',
                'password' => Hash::make('superadmin@admin.com'),
            ]);


            $admin = User::create([
                'name'          => 'Khan',
                'urole'         => 'admin',
                'email'         => 'admin@admin.com',
                'password'      => Hash::make('admin@admin.com'),
            ]);

            $author = User::create([
                'name'     => 'Arabi',
                'urole'    => 'author',
                'email'    => 'author@admin.com',
                'password' => Hash::make('author@admin.com'),
            ]);

            $officer = User::create([
                'name'     => 'ami',
                'urole'    => 'officer',
                'email'    => 'officer@admin.com',
                'password' => Hash::make('officer@admin.com'),
            ]);

            $teammate = User::create([
                'name'     => 'mu',
                'urole'    => 'teammate',
                'email'    => 'teammate@admin.com',
                'password' => Hash::make('teammate@admin.com'),
            ]);

            $salesperson = User::create([
                'name'     => 'na',
                'urole'    => 'salesperson',
                'email'    => 'salesperson@admin.com',
                'password' => Hash::make('salesperson@admin.com'),
            ]);

            $user = User::create([
                'name'     => 'Mollah',
                // 'urole'    => 'user',
                'email'    => 'user@admin.com',
                'password' => Hash::make('user@admin.com'),
            ]);

            $superadmin->roles()->attach($superadminRole);
            $admin     ->roles()->attach($adminRole);
            $author    ->roles()->attach($authorRole);
            $officer   ->roles()->attach($officer);
            $teammate  ->roles()->attach($teammate);
            $salesperson ->roles()->attach($salesperson);
            $user      ->roles()->attach($userRole);

    }
}
