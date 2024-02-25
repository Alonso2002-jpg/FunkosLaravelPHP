<?php

namespace Database\Seeders;

use App\Models\Funko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FunkosSeeder extends Seeder
{
    public function run(): void
    {
        Funko::truncate();
        Funko::create([
            'name' => 'Funko Hanna Montana',
            'description' => ' ¡Acompaña a Hanna Montana en sus aventuras más locas! Con su micrófono en mano, esta estrella del pop te hará bailar y cantar al ritmo de su música más pegajosa.',
            'price' => 10.99,
            'quantity' => 1000,
            'img' => 'funkos\funko-pop-hannah-montana.jpg',
            'category_id' => 1,
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Bob Esponja',
            'description' => 'Sumérgete en el divertido mundo de Fondo de Bikini con Bob Esponja y sus amigos. Este Funko captura la esencia alegre y traviesa del esponja más famoso del océano.',
            'price' => 12.50,
            'quantity' => 10,
            'img' => 'funkos\funko-bob-esponja.jpg',
            'category_id' => 2,
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Darth Vader',
            'description' => '¡Únete al lado oscuro con este impresionante Funko de Darth Vader! Con su imponente presencia, este Funko es imprescindible para cualquier fan de Star Wars.',
            'price' => 15.99,
            'quantity' => 500,
            'img' => 'funkos\funko-darth.jpg',
            'category_id' => 3,
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Harry Potter',
            'description' => '¡Descubre la magia con este encantador Funko de Harry Potter! Perfecto para cualquier coleccionista o fan de la saga.',
            'price' => 14.50,
            'quantity' => 20,
            'img' => 'funkos\funko-harry.jpg',
            'category_id' => 4,
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Iron Man',
            'description' => '¡Haz brillar tu colección con este increíble Funko de Iron Man! Presentando al héroe favorito de Marvel en todo su esplendor.',
            'price' => 13.99,
            'quantity' => 300,
            'img' => 'funkos\funko-pop-iron-man.jpg',
            'category_id' => 5,
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Batman',
            'description' => '¡Agrega un toque de misterio a tu colección con este genial Funko de Batman! Perfecto para cualquier fanático del Caballero Oscuro.',
            'price' => 11.99,
            'quantity' => 150,
            'img' => 'funkos\funko-batman.jpg',
            'category_id' => 6,
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Jinx',
            'description' => '¡Haz estallar la diversión con este vibrante Funko de Jinx! Ideal para los amantes del juego League of Legends.',
            'price' => 16.50,
            'quantity' => 50,
            'img' => 'funkos\funko-jinx.jpg',
            'category_id' => 7,
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Mickey Mouse',
            'description' => '¡Es hora de la magia con Mickey Mouse! Este Funko te transportará al mundo mágico de Disney, donde la diversión y la aventura nunca terminan.',
            'price' => 9.99,
            'quantity' => 800,
            'img' => 'funkos\funko-pop-mickey-mouse.jpg',
            'category_id' => 1, // ID de la categoría Disney
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Patrick Estrella',
            'description' => ' ¿Estás listo para la diversión bajo el mar? Patrick Estrella llega en forma de Funko para traerte risas y alegría mientras exploras el mundo de Bob Esponja.',
            'price' => 11.50,
            'quantity' => 15,
            'img' => 'funkos\funko-pop-patricio.jpg',
            'category_id' => 2, // ID de la categoría Nickelodeon
            'isDeleted' => false
        ]);

        Funko::create([
            'name' => 'Funko Yoda',
            'description' => ' Con sabiduría y poder, Yoda llega en forma de Funko para proteger la galaxia. Con su característica sabiduría y fuerza, este Funko te recordará siempre que la Fuerza te acompaña.',
            'price' => 14.99,
            'quantity' => 400,
            'img' => 'funkos\funko-yoda.jpg',
            'category_id' => 3, // ID de la categoría Star Wars
            'isDeleted' => false
        ]);


        Funko::create([
            'name' => 'Funko Braum',
            'description' => '¡Hazte fuerte y embosca a tus enemigos con Braum! Este Funko captura la astucia y la valentía del explorador de League of Legends mientras recorre los campos de batalla de Runaterra.',
            'price' => 15.50,
            'quantity' => 60,
            'img' => 'funkos\funko-braum.jpg',
            'category_id' => 7, // ID de la categoría League of Legends
            'isDeleted' => false
        ]);

    }
}
