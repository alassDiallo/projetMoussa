<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre')->unique();
            $table->string('slug')->unique();
            $table->string('sousTitre');
            $table->string('description');
            $table->integer('prix');
            $table->string('qualite');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')
                   ->references('id')
                   ->on('categories')
                   ->onDelete('restrict')
                   ->onUpdate('cascade');
            $table->string('image');
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
        Schema::dropIfExists('produits');
    }
}
