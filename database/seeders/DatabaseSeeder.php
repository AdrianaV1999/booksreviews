<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        Review::truncate();
        User::truncate();

        $user1 =User::factory()->create();
        $user2 =User::factory()->create();
        $user3 =User::factory()->create();

        $book1 = Book::create(
            ['title'=>'Anna Karenina',
            'price'=>'25']);
        $book2 = Book::create(
            ['title'=>'Odyssey ',
             'price'=>'35']);
        $book3 = Book::create(
            ['title'=>'Little Women',
             'price'=>'27']);

            $rew1 = Review::create([
                'rate'=>'9',
                'comment'=>'Very inspirational book!',
                'user_id'=>$user1->id,
                'book_id'=>$book1->id
            ]);
            $rew2 = Review::create([
                'rate'=>'7',
                'comment'=>'Book is okay',
                'user_id'=>$user2->id,
                'book_id'=>$book2->id
            ]);
            $rew3 = Review::create([
                'rate'=>'8',
                'comment'=>'Great story!',
                'user_id'=>$user1->id,
                'book_id'=>$book3->id
            ]);
            $rew4 = Review::create([
                'rate'=>'2',
                'comment'=>'Dont like it',
                'user_id'=>$user3->id,
                'book_id'=>$book3->id
            ]);
}
}
