<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('what', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('tag');
            $table -> string('subtag')->nullable();
            $table -> dateTime('now')->useCurrent();
            $table -> dateTime('onwhen')->nullable();
            $table -> string('who');
            $table -> string('inwhere');
            $table -> string('forwhy')->nullable();
            $table -> string('action')->nullable();
            $table -> string('withwho')->nullable();
            $table -> string('doing');
            $table -> string('what');
            $table -> integer('repet');
            $table -> datetime('remind')->nullable();
            $table -> integer('subwhat');
            $table -> string('comment')->nullable();
            $table -> string('source')->nullable();
            $table -> string('url')->nullable();
            $table -> tinyInteger('opened')->notNull();
            $table -> string('description')->nullable();
            
//             $table->id();
//             $table->string('name');
//             $table->string('email')->unique();
//             $table->timestamp('email_verified_at')->nullable();
//             $table->string('password');
//             $table->rememberToken();
//             $table->timestamps();
            
//             $table->string('email')->index();
//             $table->string('token');
//             $table->timestamp('created_at')->nullable();
            
//             $table->id();
//             $table->text('connection');
//             $table->text('queue');
//             $table->longText('payload');
//             $table->longText('exception');
//             $table->timestamp('failed_at')->useCurrent();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('what');
    }
}
