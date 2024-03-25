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
        Schema::create('reseller', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('noHp');
            $table->string('email')->index();
            $table->unsignedBigInteger('idWilayah');
            $table->string('propinsi');
            $table->string('kotaKab');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat')->nullable();
            $table->string('instagram')->nullable();
            $table->string('shopee')->nullable();
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
        $table->dropForeign('idWilayah'); $table->dropIndex('idWilayah');
        Schema::dropIfExists('reseller');
    }
};
