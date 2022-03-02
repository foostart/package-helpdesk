<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;
/** ten table
*/
class CreateRequestTable extends FoostartMigration
{
    public function __construct() {
        $this->table = 'request';
        $this->prefix_column = 'request_';
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
            $table->string($this->prefix_column . 'name', 255)->comment('Helpdesk name');
            $table->string($this->prefix_column . 'slug', 255)->comment('Helpdesk slug');
            $table->string($this->prefix_column . 'start_date', 255)->nullable()->comment('Helpdesk start date');
            $table->string($this->prefix_column . 'end_date', 255)->nullable()->comment('Helpdesk end date');

            $table->string($this->prefix_column . 'image', 255)->nullable()->comment('Helpdesk image');
            $table->text($this->prefix_column . 'description')->nullable()->comment('Helpdesk description');

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
