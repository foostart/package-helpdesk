<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;
/** ten table
*/
class CreateStudentsTable extends FoostartMigration
{
    public function __construct() {
        $this->table = 'students';
        $this->prefix_column = 'student_';
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
            $table->string($this->prefix_column . 'address', 255)->comment('Address student');
            $table->string($this->prefix_column . 'dob_date', 255)->nullable()->comment('Student birthday');
            $table->string($this->prefix_column . 'enroll_date', 255)->nullable()->comment('Student Enroll date');

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
