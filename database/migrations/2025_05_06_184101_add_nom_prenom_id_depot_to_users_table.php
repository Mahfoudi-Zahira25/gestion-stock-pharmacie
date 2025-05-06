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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nom')->after('name');
            $table->string('prenom')->after('nom');
            $table->unsignedBigInteger('id_depot')->nullable()->after('prenom');
    
            // Clé étrangère vers table depot
            $table->foreign('id_depot')->references('id')->on('depot')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_depot']);
            $table->dropColumn(['nom', 'prenom', 'id_depot']);
        });
    }
    
};
