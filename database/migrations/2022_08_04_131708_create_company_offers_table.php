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
        Schema::create('company_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onUpDate('cascade')->onDelete('cascade');
            $table->text('headline');
            $table->string('job_title');
            $table->text('introduce');
            $table->string('thumbnail')->nullable();
            $table->timestamp('deadline');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_offers');
    }
};
