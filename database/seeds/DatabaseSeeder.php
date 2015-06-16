<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(['username'=>'admin','password'=>bcrypt('admin')]);

        DB::table('sets')->delete();
        DB::table('sets')->insert([
          'title'    => 'Boomdawn',
          'keyword'  => 'Boomdawn',
          'des'      => 'Boomdawn Blog',
          'copy'     => 'Powered by Boomdawn',
          'page_num' => '10',
          ]);
    }

}
