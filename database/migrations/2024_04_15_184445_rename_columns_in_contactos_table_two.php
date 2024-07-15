<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInContactosTableTwo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->boolean('privacyPolicy')->default(false);
            $table->boolean('newsletter')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->dropColumn('privacyPolicy');
            $table->dropColumn('newsletter');
        });
    }
}
