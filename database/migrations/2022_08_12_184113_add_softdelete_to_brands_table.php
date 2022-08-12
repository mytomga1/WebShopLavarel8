<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * (Sử dụng câu lệnh này để add cột softdelete trong bảng brands)
 * --> php artisan make:migration add_softdelete_to_brands_table --table=brands
 *
 * (Sử dụng câu lệnh này để upload cột deleted_at(softdelete) trong bảng brands trong DB)
 *     php artisan migrate --path=/database/migrations/(Tên file.php)
 * --> php artisan migrate --path=/database/migrations/2022_08_12_184113_add_softdelete_to_brands_table.php
 */

class AddSoftdeleteToBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->softDeletes(); // add phương thức softDelete() vào table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            //
        });
    }
}
