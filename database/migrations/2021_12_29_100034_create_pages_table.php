<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('breadcrumb_title')->nullable()->default(null);
            $table->string('breadcrumb_subtitle')->nullable()->default(null);
            $table->string('slug');
            $table->string('banner')->nullable()->default(null);
            $table->string('banner_title')->nullable()->default(null);
            $table->longText('content');
            $table->boolean('status')->default(true);
            $table->boolean('is_main_menu')->default(true);
            $table->boolean('is_footer_menu')->default(true);
            $table->boolean('status')->default(true);
            $table->text('meta_title')->nullable()->default(null);
            $table->text('meta_keyword')->nullable()->default(null);
            $table->text('meta_description')->nullable()->default(null);
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
        Schema::dropIfExists('pages');
    }
}
