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
        Schema::create('taxation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('rate_tax');
            $table->date('date_start');
            $table->date('date_end');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();

            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxation');
    }
};