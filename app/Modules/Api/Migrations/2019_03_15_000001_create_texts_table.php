<?php

use App\Helpers\GlobalHelper;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration
{
    protected $tableName;

    /**
     * Default constructor.
     */
    public function __construct()
    {
        $this->tableName = str_replace("Create", "", get_class($this));
        $this->tableName = str_replace("Table", "", $this->tableName);
        $this->tableName = GlobalHelper::fromCamelCaseToSnakeCase($this->tableName);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('identifier');
            $table->string('type')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');


            $table->text('value')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->tableName);
    }

}
