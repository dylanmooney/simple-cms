<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        Role::create([
            'name' => 'admin',
            'description' => 'access to all the administration features'
        ]);

        Role::create([
            'name' => 'editor',
            'description' => 'can create and update all posts'
        ]);

        Role::create([
            'name' => 'author',
            'description' => 'can publish and manage their own posts'
        ]);

        Role::create([
            'name' => 'user',
            'description' => 'can comment on posts'
        ]);
    }
}
