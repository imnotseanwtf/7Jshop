<?php

use App\Models\AboutUs;
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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('text_header');
            $table->string('header');
            $table->string('second_text');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        AboutUs::insert([
            ['text_header' => 'dummy text_header', 'header' => 'dummy header', 'second_text' => 'dummy second_text', 'image' => null],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
