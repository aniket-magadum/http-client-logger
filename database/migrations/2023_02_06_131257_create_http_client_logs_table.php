<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('http_client_logs', function (Blueprint $table) {
            $table->bigIncrements('sequence');
            $table->uuid('uuid')->unique()->index();
            $table->string('url');
            $table->string('method',10);
            $table->text('request_body')->nullable();
            $table->text('response_body')->nullable();
            $table->text('request_headers')->nullable();
            $table->text('response_headers')->nullable();
            $table->smallInteger('status_code');
            $table->decimal('response_time', 6, 2);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('http_client_logs');
    }
};
