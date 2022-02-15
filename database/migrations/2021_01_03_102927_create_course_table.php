<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;

class CreateCourseTable extends FoostartMigration
{
    public function __construct() {
        $this->table = 'course';
        $this->prefix_column = 'course_';
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
            $table->integer('category_id')->comment('Category ID');

            // Other attributes
            $table->string($this->prefix_column . 'name', 255)->comment('Course name');
            $table->string($this->prefix_column . 'slug', 255)->comment('Course slug');
            $table->string($this->prefix_column . 'start_date', 255)->nullable()->comment('Course start date');
            $table->string($this->prefix_column . 'end_date', 255)->nullable()->comment('Course end date');

            $table->string($this->prefix_column . 'image', 255)->nullable()->comment('Course image');
            $table->text($this->prefix_column . 'description')->nullable()->comment('Course description');

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
