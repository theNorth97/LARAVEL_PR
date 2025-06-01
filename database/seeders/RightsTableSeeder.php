<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::table('rights')->insert([
            ['name' => 'can_create_apppllication'],
            ['name' => 'can_delete_apppllication'],
            ['name' => 'can_update_apppllication'],
            ['name' => 'can_view_apppllications'],
            ['name' => 'can_accept_apppllication_in_work'],
            ['name' => 'can_complete_apppllication'],
            ['name' => 'can_leave_a_review_apppllication'],
        ]);
    }
}
