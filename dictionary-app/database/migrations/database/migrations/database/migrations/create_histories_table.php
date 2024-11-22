<?php
// database/migrations/xxxx_xx_xx_create_histories_table.php



public function up()
{
Schema::create('histories', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->foreignId('word_id')->constrained()->onDelete('cascade');
$table->timestamps();
});
}