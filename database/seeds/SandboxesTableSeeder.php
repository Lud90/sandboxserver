<?php

use Illuminate\Database\Seeder;

class SandboxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sandbox')->insert([
            'name' => 'Shiftkey Labs',
            'address' => '6050 University Ave, Halifax, NS, B3H 4R2',
            'email' => 'info@shiftkeylabs.ca',
            'url' => 'http:/shiftkeylabs.ca'
        ]);

        DB::table('sandbox')->insert([
            'name' => 'Launchbox',
            'address' => 'Acadia University, Box 142, Wolfville, NS B4P 2R6 ',
            'email' => 'entrepreneurship@acadiau.ca',
            'url' => 'http://www.acadiaentrepreneurshipcentre.com/launchbox'
        ]);
    }
}
