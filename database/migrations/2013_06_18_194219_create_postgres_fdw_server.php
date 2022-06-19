<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        $SERVER_NAME = env("SERVER_NAME");
        $DATABASE_SCHEMA_NAME = env("DATABASE_SCHEMA_NAME");

        $TARGET_DATABASE_HOST = env("TARGET_DATABASE_HOST", "127.0.01");
        $TARGET_DATABASE_PORT = env("TARGET_DATABASE_PORT", "5432");
        $TARGET_DATABASE_NAME = env("TARGET_DATABASE_NAME");
        $TARGET_DATABASE_USERNAME = env("TARGET_DATABASE_USERNAME", "postgres");
        $TARGET_DATABASE_PASSWORD = env("TARGET_DATABASE_PASSWORD", "postgres");

        DB::statement("CREATE EXTENSION postgres_fdw;");
        DB::statement("CREATE SERVER $SERVER_NAME FOREIGN DATA WRAPPER postgres_fdw OPTIONS (host '$TARGET_DATABASE_HOST', dbname '$TARGET_DATABASE_NAME', port '$TARGET_DATABASE_PORT');");
        DB::statement("CREATE USER MAPPING FOR CURRENT_USER SERVER $SERVER_NAME OPTIONS (user '$TARGET_DATABASE_USERNAME', password '$TARGET_DATABASE_PASSWORD');");
        DB::statement("CREATE SCHEMA $DATABASE_SCHEMA_NAME");
    }

    public function down()
    {
    }
};
