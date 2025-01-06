<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeatRegistrationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takeat_registration_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('state')->default(0);
            $table->boolean('is_renewal')->default(false);
            $table->foreignId('associations_id')->constrained();
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
        Schema::dropIfExists('takeat_registration_requests');
    }
}
