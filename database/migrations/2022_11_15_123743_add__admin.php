<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [
            'name' => 'Jone Doe',
            'email' => 'joneDoe@gmail.com',
            'password' => Hash::make(123456),
            'phone' => 0171234564,
            'email_verified_at' => now()
        ];

        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
