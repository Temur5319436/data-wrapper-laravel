<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        $SERVER_NAME = env("SERVER_NAME");
        $DATABASE_SCHEMA_NAME = env("DATABASE_SCHEMA_NAME");

        DB::statement("IMPORT FOREIGN SCHEMA public LIMIT TO (users) FROM SERVER $SERVER_NAME INTO $DATABASE_SCHEMA_NAME;");
    }

    public function down()
    {
    }
};
