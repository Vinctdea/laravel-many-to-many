<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Tag;



class JobsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {

            $job = Job::inRandomOrder()->first();

            $tag_id = Tag::inRandomOrder()->first()->id;

            $job->tags()->attach($tag_id);
        }
    }
}
