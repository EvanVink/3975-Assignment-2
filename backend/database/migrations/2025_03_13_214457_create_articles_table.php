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

        

        Schema::create('Article', function (Blueprint $table) {
            $table->integer("ArticleId")->primary();
            $table->string('Title');
            $table->string('Body');
            $table->datetime('CreateDate');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->string('ContributorUsername');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Article');
    }
};
