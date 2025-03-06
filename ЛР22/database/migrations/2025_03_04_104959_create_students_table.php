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
//        \Illuminate\Support\Facades\DB::table('students')->get();
//        \Illuminate\Support\Facades\DB::table('students')
//            ->insert([
//                'name' => 'Анастасия', 'surname' => 'Апанович', 'patronymic' => 'Викторовна', 'sex' => 'Женщина', 'birthday' => '05-09-2005', 'speciality' => 'Программист'
//            ]);

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('sex');
            $table->date('birthday');
            $table->string('speciality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
