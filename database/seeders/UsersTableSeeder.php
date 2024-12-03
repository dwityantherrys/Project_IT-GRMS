<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => '2024-08-16 01:31:15',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'NdOYUUbTeQ',
                'session_id' => NULL,
                'created_at' => '2024-08-16 01:31:16',
                'updated_at' => '2024-08-16 01:31:16',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Grover Theo',
                'email' => 'grovertheo@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$YzvTwwolwPGRREp/5RJizO1OLV/VhpC/r8wZzg3I.4JgdGjBFoWse',
                'remember_token' => 'Aj2YiBNupNSPy6QT64aJfGzu1bHDh68579SHZQi8kGux4YYNIXDLTiL0YGZ3',
                'session_id' => NULL,
                'created_at' => '2024-08-16 02:05:01',
                'updated_at' => '2024-09-17 08:15:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IT Vicky',
                'email' => 'vicky.mail@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$MHnxZMA3BJ1zl1mAn04N9uAsWR0/fqmUo03DWv5gI/I0/ASwfkKDq',
                'remember_token' => NULL,
                'session_id' => NULL,
                'created_at' => '2024-08-27 06:31:42',
                'updated_at' => '2024-08-27 08:08:34',
            ),
        ));
        
        
    }
}