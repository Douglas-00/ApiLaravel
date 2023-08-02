<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('assignee_id');
            $table->string('title',100);
            $table->string('description',255);
            $table->dateTime('due_date');
            $table->timestamps();

            //Chave estrangeira para o Departamento
            $table->foreign('assignee_id')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
