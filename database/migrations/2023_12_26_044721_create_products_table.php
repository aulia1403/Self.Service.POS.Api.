<?php

use App\Models\product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('description');
            $table->timestamps();
        });

        $faker = \Faker\Factory::create();
        for($i=0;$si<10;$i++){
            product::create([
                'name' => $faker->word,
                'price' => $faker->randomNumber(3,true),
                'description' => $faker->sentence(5, true)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
