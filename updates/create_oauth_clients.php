<?php namespace LukeTowers\Passport\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateOauthClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->nullable();
            $table->string('name');
            $table->string('secret', 100);
            $table->text('redirect');
            $table->boolean('personal_access_client');
            $table->boolean('password_client');
            $table->boolean('revoked');
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
        Schema::drop('oauth_clients');
    }
}
