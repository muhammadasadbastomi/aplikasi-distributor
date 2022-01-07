<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('partNumber');
            $table->string('deskripsi');
            $table->string('partReference');
            $table->string('kodeSupplier');
            $table->string('kodeGroupSales');
            $table->string('partStatus');
            $table->string('HET');
            $table->string('hargaPokok');
            $table->string('moqDk');
            $table->string('moqDm');
            $table->string('moqDb');
            $table->string('partNumberType');
            $table->string('partMoving');
            $table->string('partSource');
            $table->string('partCurrent');
            $table->string('partType');
            $table->string('partLifetime');
            $table->string('partGroup');
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
        Schema::dropIfExists('spareparts');
    }
}
