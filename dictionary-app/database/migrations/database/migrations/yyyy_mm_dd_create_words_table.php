// database/migrations/xxxx_xx_xx_create_words_table.php
public function up()
{
Schema::create('words', function (Blueprint $table) {
$table->id();
$table->string('word');
$table->text('definition');
$table->timestamps();
});
}