<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_az')->nullable();
            $table->string('telefon');
            $table->string('mobil');
            $table->string('email');
            $table->string('linkedin');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('seo_title_az')->nullable();
            $table->string('seo_keywords_az')->nullable();
            $table->text('seo_desctioption_az')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
