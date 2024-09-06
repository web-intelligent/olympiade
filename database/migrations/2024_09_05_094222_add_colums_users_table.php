<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('chief_email', 55);
            $table->string('first_name', 55);
            $table->string('last_name', 55);
            $table->string('fio', 255);
            $table->string('org_name', 355);
            $table->string('region', 255)->nullable();
            $table->string('municipality', 255)->nullable();
            $table->string('state', 255);
            $table->string('seat', 255);
            $table->string('class_group', 255);

            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn([
                'chief_email',
                'first_name',
                'last_name',
                'fio',
                'org_name',
                'region',
                'municipality',
                'state',
                'seat',
                'class_group',
            ]);
            $table->string('name', 255);
        });
    }
}
