<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Doctors;
use App\Models\DoctorTypes;
use App\Models\Times;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::query()->insert(
            [
                'full_name' => 'Admin Admin Admin',
                'birthday' => date('y-m-d'),
                'number' => '80000000000',
                'password' => Hash::make('password'),
                'isAdmin' => true
            ]
        );

        DoctorTypes::query()->insert(
            [
                [
                    'name' => 'Терапевт'
                ],
                [
                    'name' => 'Гинеколог'
                ],
                [
                    'name' => 'Кардиолог'
                ],
                [
                    'name' => 'Гастроэнтеролог'
                ],
                [
                    'name' => 'Хирург'
                ],
                [
                    'name' => 'Вирусолог'
                ],
            ]
        );

        Times::query()->insert(
            [
                [
                    'time' => '09:00'
                ],
                [
                    'time' => '09:30'
                ],
                [
                    'time' => '10:00'
                ],
                [
                    'time' => '10:30'
                ],
                [
                    'time' => '11:00'
                ],
                [
                    'time' => '11:30'
                ],
                [
                    'time' => '12:00'
                ],
                [
                    'time' => '13:30'
                ],
                [
                    'time' => '14:00'
                ],
                [
                    'time' => '14:30'
                ],
            ]
        );

        Doctors::query()->insert(
            [
                [
                    'type_id' => 1,
                    'full_name' => 'Ермолова Любовь Давидовна',
                    'image' => '/images/6.jpg',
                    'exp' => 15
                ],
                [
                    'type_id' => 2,
                    'full_name' => 'Марков Алексей Алексеевич',
                    'image' => '/images/4.jpg',
                    'exp' => 38
                ],
                [
                    'type_id' => 3,
                    'full_name' => 'Игнатова Нина Серафимовна',
                    'image' => '/images/2.jpg',
                    'exp' => 20
                ],
                [
                    'type_id' => 4,
                    'full_name' => 'Быков Артём Даниилович',
                    'image' => '/images/5.jpg',
                    'exp' => 11
                ],
                [
                    'type_id' => 5,
                    'full_name' => 'Ильина Владислава Владиславовна',
                    'image' => '/images/3.jpg',
                    'exp' => 13
                ],
                [
                    'type_id' => 6,
                    'full_name' => 'Петров Арсений Артёмович',
                    'image' => '/images/1.jpg',
                    'exp' => 5
                ],
            ]
        );
    }
}
