<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('partner_id')->nullable();
            $table->string('title_az');
            $table->text('text_az');
            $table->text('short_az');
            $table->integer('created_by');
            $table->string('seo_title_az')->nullable();
            $table->string('seo_keywords_az')->nullable();
            $table->text('seo_desctioption_az')->nullable();
            $table->timestamp('created_date')->useCurrent();
            $table->integer('view')->default(0);
            $table->integer('status')->default(1);
            $table->integer('type')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
