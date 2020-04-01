<?php

use App\Helpers\GlobalHelper;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateSessionsTable extends Migration
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

            $table->unsignedBigInteger('coach_id')->nullable();
            $table->foreign('coach_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('coached_id')->nullable();
            $table->foreign('coached_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('feedback')->nullable();

            $table->boolean('approved')->default(false);
            $table->boolean('paid')->default(false);

            $table->string('payment_url')->nullable();

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
