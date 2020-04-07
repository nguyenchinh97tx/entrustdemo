<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'title'=>'Sách 1',
                'content'=>'Nội dung sách 1'
            ],
            [
                'title'=>'Sách 2',
                'content'=>'Nội dung sách 2'
            ],
            [
                'title'=>'Sách 3',
                'content'=>'Nội dung sách 3'
            ],
        ]);
    }
}
