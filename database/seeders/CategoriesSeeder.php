<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Category::truncate();
        Category::create([
            'nameCategory' => 'DISNEY',
            'isDeleted' => false,
        ]);
        Category::create([
            'nameCategory' => 'NICKELODEON',
            'isDeleted' => false,
        ]);
        Category::create([
            'nameCategory' => 'STAR WARS',
            'isDeleted' => false,
        ]);
        Category::create([
            'nameCategory' => 'HARRY POTTER',
            'isDeleted' => false,
        ]);
        Category::create([
            'nameCategory' => 'MARVEL',
            'isDeleted' => false,
        ]);
        Category::create([
            'nameCategory' => 'DC COMICS',
            'isDeleted' => false,
        ]);
        Category::create([
            'nameCategory' => 'LEAGUE OF LEGENDS',
            'isDeleted' => false,
        ]);
        Category::create([
            'nameCategory' => 'SIN CATEGORIA',
            'isDeleted' => false,
        ]);
    }
}
