<?php

use App\Helpers\GlobalHelper;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
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

            $table->string('title');
            $table->text('content')->nullable();
            $table->text('description')->nullable();
            $table->text('organizers')->nullable();
            $table->text('topics')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('url')->nullable();
            $table->string('image')->nullable();

            $table->text('tags')->nullable();

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
