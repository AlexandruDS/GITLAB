<?php

use App\Modules\Api\Models\Language;
use App\Modules\Api\Models\User;
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

        $this->seedLanguages();
        $this->seedUsers();


    }

    // Users Countries
    private function seedLanguages()
    {
        Language::create([
            'name' => 'Romana',
            'code' => 'ro'
        ]);
        Language::create([
            'name' => 'English',
            'code' => 'en'
        ]);
    }


    // Users Seed
    private function seedUsers()
    {
        User::create([
            'id' => 1,
            'is_admin' => true,
            'is_coach' => true,
            'first_name' => 'Alexandru',
            'last_name' => 'Stoian',
            'email' => 'alexandru.stoian@pathways-consulting.net',
            'password' => bcrypt('P@thw@ys2019')
        ]);
    }


}
