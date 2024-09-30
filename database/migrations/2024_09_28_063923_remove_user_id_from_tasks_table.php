<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Menghapus foreign key constraint
            $table->dropForeign(['user_id']); // Pastikan nama kolomnya benar
            
            // Menghapus kolom user_id
            $table->dropColumn('user_id');
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Menambahkan kembali kolom user_id
            $table->unsignedBigInteger('user_id')->nullable()->after('status');

            // Menambahkan kembali foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
