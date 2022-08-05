<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('Kategori');
            $table->bigInteger('Harga');
            $table->string('Gambar');
            $table->bigInteger('Terjual');
            $table->timestamps();
        });

        DB::table('menus')->insert(
            [
                [
                'Nama' => 'Mie Ayam',
                'Kategori' => 'Makanan',
                'Gambar' => 'https://www.pegipegi.com/travel/wp-content/uploads/2018/06/shutterstock_1046157670.jpg',
                'Terjual' => 156,
                'Harga' => 15000,
                ],
                [
                'Nama' => 'Geprek Ayam',
                'Kategori' => 'Makanan',
                'Gambar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Ayam_geprek.png/544px-Ayam_geprek.png',
                'Terjual' => 112,
                'Harga' => 17000,
                ],
                [
                'Nama' => 'Es Teh',
                'Kategori' => 'Minuman',
                'Gambar' => 'https://nilaigizi.com/assets/images/produk/produk_1578040540.jpg',
                'Terjual' => 86,
                'Harga' => 4000,
                ],
                [
                'Nama' => 'Es Jeruk',
                'Kategori' => 'Minuman',
                'Gambar' => 'https://i.pinimg.com/originals/8a/47/f7/8a47f764140314821d670bdfa60af831.jpg',
                'Terjual' => 65,
                'Harga' => 5000,
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
