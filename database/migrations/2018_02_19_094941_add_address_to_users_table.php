<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
			$table->string('first_name');
			$table->string('last_name');
            $table->string('address');
			$table->string('town');
			$table->integer('zipcode')->unsigned();
			$table->string('province');
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
			$table->dropColumn('first_name');
			$table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('town');
            $table->dropColumn('zipcode');
            $table->dropColumn('province');
        });
    }
}
