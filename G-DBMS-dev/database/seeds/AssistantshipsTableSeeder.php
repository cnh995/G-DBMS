<?php

use Illuminate\Database\Seeder;

class AssistantshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('assistantships')->delete();

        $assistantships = [
            // Assistantships for Fall 2015
            [
                'id' => 1, 'semester_id' => 5, 'student_id' => '8881111',
                'position' => 'GRA', 'date_offered' => '2016-07-01',
                'date_responded' => '2016-07-30', 'defer_date' => null,
                'current_status_id' => 2, 'corresponding_tuition_waiver_id' => 1,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/2 time',
            ],
            [
                'id' => 2, 'semester_id' => 5, 'student_id' => '8882222',
                'position' => 'GTA', 'date_offered' => '2016-07-01',
                'date_responded' => '2016-07-30', 'defer_date' => null,
                'current_status_id' => 2, 'corresponding_tuition_waiver_id' => 2,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/4 time',
            ],
            [
                'id' => 3, 'semester_id' => 5, 'student_id' => '8883333',
                'position' => 'GTA', 'date_offered' => '2016-07-01',
                'date_responded' => '2016-07-30', 'defer_date' => null,
                'current_status_id' => 2, 'corresponding_tuition_waiver_id' => 3,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/2 time',
            ],
            [
                'id' => 4, 'semester_id' => 5, 'student_id' => '8884444',
                'position' => 'GRA', 'date_offered' => '2016-07-01',
                'date_responded' => '2016-07-30', 'defer_date' => null,
                'current_status_id' => 2, 'corresponding_tuition_waiver_id' => 4,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/2 time',
            ],

            // Assistantships for Spring 2016
            [
                'id' => 5, 'semester_id' => 6, 'student_id' => '8881111',
                'position' => 'GRA', 'date_offered' => '2016-12-01',
                'date_responded' => '2016-12-30', 'defer_date' => null,
                'current_status_id' => 2, 'corresponding_tuition_waiver_id' => 5,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/4 time',
            ],
            [
                'id' => 6, 'semester_id' => 6, 'student_id' => '8882222',
                'position' => 'GRA', 'date_offered' => '2016-12-01',
                'date_responded' => '2016-12-30', 'defer_date' => null,
                'current_status_id' => 2, 'corresponding_tuition_waiver_id' => 6,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/2 time',
            ],
            [
                'id' => 7, 'semester_id' => 6, 'student_id' => '8883333',
                'position' => 'GTA', 'date_offered' => '2016-12-01',
                'date_responded' => '2016-12-30', 'defer_date' => null,
                'current_status_id' => 2, 'corresponding_tuition_waiver_id' => 7,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/4 time',
            ],
            [
                'id' => 8, 'semester_id' => 6, 'student_id' => '8884444',
                'position' => 'GRA', 'date_offered' => '2016-12-01',
                'date_responded' => '2016-12-30', 'defer_date' => null,
                'current_status_id' => 1, 'corresponding_tuition_waiver_id' => 8,
                'stipend' => 10000.00, 'funding_source_id' => 1,
                'time' => '1/4 time',
            ],
        ];

        // Uncomment the below to run the seeder
        DB::table('assistantships')->insert($assistantships);
    }
}
