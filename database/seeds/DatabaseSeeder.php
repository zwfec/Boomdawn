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
        DB::table('users')->insert(['id'=>1,'username'=>'admin','password'=>bcrypt('admin')]);

        DB::table('sets')->delete();
        DB::table('sets')->insert([
          'id'       => 1,
          'title'    => 'Boomdawn',
          'keyword'  => 'Boomdawn',
          'des'      => 'A Simple Blog A Simple People',
          'copy'     => 'Powered by Boomdawn',
          'page_num' => '10',
        ]);

        DB::table('abouts')->delete();
        DB::table('abouts')->insert(['id'=>1,'title'=>'关于','content'=>' ']);
    }

}
