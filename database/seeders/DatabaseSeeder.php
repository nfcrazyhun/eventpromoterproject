<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Seed default admin users
        $this->call(AdminUserSeeder::class);

        // Seed demo Locations
        $this->call(LocationSeeder::class);

        // Seed demo Events
        $this->call(EventSeeder::class);

        // Seed demo Performers
        $this->call(PerformerSeeder::class);

        // Seed demo event-performer assignments
        $this->call(EventPerformerSeeder::class);

        // Seed demo tickets for users
        $this->call(TicketSeeder::class);

    }
}
