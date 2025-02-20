<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('facebook_visible')->default(true);
            $table->boolean('twitter_visible')->default(true);
            $table->boolean('linkedin_visible')->default(true);
            $table->boolean('github_visible')->default(true);
            $table->boolean('instagram_visible')->default(true);
            $table->boolean('youtube_visible')->default(true);
        });
    }
    
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'facebook_visible',
                'twitter_visible',
                'linkedin_visible',
                'github_visible',
                'instagram_visible',
                'youtube_visible',
            ]);
        });
    }
    
};
