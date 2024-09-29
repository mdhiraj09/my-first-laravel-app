<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('custome_id'); //customer_id custome name
            $table->string('name',60);
            $table->string('email',100);
            $table->enum('gender',["m","f","O"]);
            $table->text('address');
            $table->date('dob')->nullable();
            $table->string('password');//default klimit 255 hai
            $table->boolean('status')->default(1);
            $table->integer('points')->default(0);
            $table->timestamps(); //created at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
