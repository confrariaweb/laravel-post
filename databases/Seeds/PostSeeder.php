<?php

namespace ConfrariaWeb\Post\Databases\Seeds;

use ConfrariaWeb\Post\Models\PostSection;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSectionsPosts();
    }

    private function createSectionsPosts()
    {
        //PostSection::firstOrCreate(['user_id' => 1, 'name' => 'Blog', 'slug' => 'blog']);
        //PostSection::firstOrCreate(['user_id' => 1, 'name' => 'Page', 'slug' => 'page']);
        //PostSection::firstOrCreate(['user_id' => 1, 'name' => 'Testimonials', 'slug' => 'testimonials']);
    }
}
