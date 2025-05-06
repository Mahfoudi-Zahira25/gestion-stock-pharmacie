<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotTable extends Migration
{
    public function up()
    {
        Schema::create('depots', function (Blueprint $table) {
            $table->id(); // Laravel crée automatiquement une colonne 'id' comme clé primaire
            $table->string('nom');
            $table->string('type');
            $table->timestamps(); // Crée automatiquement 'created_at' et 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('depots');
    }
}
