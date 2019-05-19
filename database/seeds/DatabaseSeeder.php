<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(CategoryProbTitleSeeder::class);
         $this->call(CategoryProbValuesSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(PostProbsSeeder::class);
         $this->call(PostAttahchmentSeeder::class);
         $this->call(LikesSeeder::class);
         $this->call(CommentsSeeder::class);
         $this->call(NotificationSeeder::class);
         $this->call(PaymentSeeder::class);
         $this->call(MessageSeeder::class);
    }
}
