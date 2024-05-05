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
        Schema::create('calon_resellers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_wa');
            $table->string('email');
            $table->string('provinsi');
            $table->string('kotakab');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('calon_resellers');
    }
};
