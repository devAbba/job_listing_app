<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKeys;

class DatabaseSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // disable foreignkeys check
        $this->disableForeignKeys();

        // truncate table
        $this->truncate('users');
        $this->truncate('listings');

        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'jdoe@galaxy.io'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);


        // enable foreign key checks afterwards
        $this->enableForeignKeys();
    }
}
