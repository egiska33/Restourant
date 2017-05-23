<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChangesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->integer('zip')->nullable()->change();
            $table->string('country')->nullable()->change();
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
            $table->dropColumn('surname')->nullable()->change();
            $table->dropColumn('address')->nullable()->change();
            $table->dropColumn('city')->nullable()->change();
            $table->dropColumn('zip')->nullable()->change();
            $table->dropColumn('country')->nullable()->change();
        });
    }
}
