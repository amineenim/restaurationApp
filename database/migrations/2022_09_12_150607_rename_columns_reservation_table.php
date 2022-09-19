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
        //
        Schema::table('reservations', function (Blueprint $table) {
            $table->renameColumn('phoneNumber','phone');
            $table->renameColumn('numberOfGuests','guests');
            $table->renameColumn('reservationDate','reservationdate');
            $table->renameColumn('reservationTime','reservationtime');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $table->renameColumn('phone','phoneNumber');
        $table->renameColumn('guests','numberOfGuests');
        $table->renameColumn('reservationdate','reservationDate');
        $table->renameColumn('reservationtime','reservationTime');
    }
};
