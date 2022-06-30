<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users_info', function (Blueprint $table) {
            $table->id();
            $table->string('profile_img')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('designation');
            $table->string('gender');
            $table->string('maritial_status')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('city')->default('Karachi');
            $table->string('state')->default('Sindh');
            $table->string('country')->default('Pakistan');
            $table->string('postal_code')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('skype_link')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('twitter_link')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
