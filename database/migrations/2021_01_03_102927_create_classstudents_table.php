<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;
/** ten table
*/
class CreateClassStudentsTable extends FoostartMigration
{
    public function __construct() {
        $this->table = 'ClassStudents';
        $this->prefix_column = 'ClassStudents_';
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists($this->table);
        Schema::create($this->table, function (Blueprint $table) {

            $table->increments($this->prefix_column . 'id')->comment('Primary key');

            // Relation
         //   $table->integer('class_id')->comment('Class ID');

            // Other attributes
            $table->string($this->prefix_column . 'name', 255)->comment('Student name');
            $table->string($this->prefix_column . 'teacher', 255)->comment('Teacher name');
            $table->string($this->prefix_column . 'class', 255)->comment('class name');
            $table->string($this->prefix_column . 'address', 255)->comment('Address student');

            $table->string($this->prefix_column . 'image', 255)->nullable()->comment('Student image');
            $table->text($this->prefix_column . 'description')->nullable()->comment('Student description');

            //Set common columns
            $this->setCommonColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
