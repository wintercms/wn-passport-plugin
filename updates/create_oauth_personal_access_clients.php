<?php namespace LukeTowers\Passport\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateOauthPersonalAccessClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_personal_access_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->index();
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
        Schema::drop('oauth_personal_access_clients');
    }
}
