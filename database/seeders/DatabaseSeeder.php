<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);

        Category::create(['name' => 'Programming', 'slug' => 'programming']);

        Category::create(['name' => 'Photography', 'slug' => 'photography']);

        Category::create(['name' => 'Fashion', 'slug' => 'fashion']);

        Category::create(['name' => 'Travel', 'slug' => 'travel']);

        User::create([
            'name' => 'dylan',
            'username' => 'dylan62',
            'email' => 'dylanmooney62@gmail.com',
            'password' => Hash::make('helloworld'),
            'role_id' => 1
        ]);

        User::factory()->count(3)->state(new Sequence(
            ['role_id' => 2],
            ['role_id' => 3],
        ))->has(Post::factory()->hasComments(2)->count(3))->create();
    }
}
