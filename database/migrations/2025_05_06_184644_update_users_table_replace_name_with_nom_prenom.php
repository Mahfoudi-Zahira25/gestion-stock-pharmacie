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
        $table->string('nom');
        $table->string('prenom');
        $table->unsignedBigInteger('id_depot');  // Assure-toi que la table `depot` existe et a une colonne `id`
        
        // Ajouter la contrainte de clé étrangère
        $table->foreign('id_depot')->references('id')->on('depot')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('nom');
        $table->dropColumn('prenom');
        $table->dropForeign(['id_depot']);  // Supprimer la contrainte de clé étrangère
        $table->dropColumn('id_depot');
    });
}
};