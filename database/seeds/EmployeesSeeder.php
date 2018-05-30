<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Faker\Factory;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        $faker = Factory::create('Ru_Ru');



        Employee::create([// 1
            'name' => $faker->name,
            'position' => 'президент',
            'employment_date' => $faker->date('Y-m-d','now'),
            'salary' => random_int(100000, 200000),
            'parent_id' => 0
        ]);

        for ($i = 0; $i < 10; $i++) {  //2-11
            Employee::create([
                'name' => $faker->name,
                'position' => 'министр',
                'employment_date' => $faker->date('Y-m-d','now'),
                'salary' => random_int(50000, 70000),
                'parent_id' => 1
            ]);
        }
        for ($i = 0; $i < 100; $i++) { //12-112
            Employee::create([
                'name' => $faker->name,
                'position' => 'депутат',
                'employment_date' => $faker->date('Y-m-d','now'),
                'salary' => random_int(45000, 70000),
                'parent_id' => random_int(2,11)
            ]);
        }
        for ($i = 0; $i < 500; $i++) { // 113-613
            Employee::create([
                'name' => $faker->name,
                'position' => 'помощник',
                'employment_date' => $faker->date('Y-m-d','now'),
                'salary' => random_int(30000, 40000),
                'parent_id' => random_int(12,112)
            ]);
        }

        for ($i = 0; $i < 50000; $i++) {
            Employee::create([
                'name' => $faker->name,
                'position' => 'сотрудник',
                'employment_date' => $faker->date('Y-m-d','now'),
                'salary' => random_int(15000, 25000),
                'parent_id' => random_int(113,613)
            ]);
        }

    }
}
