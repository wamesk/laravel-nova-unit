<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\UnitGroup;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=UnitSeeder
 */
final class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Dĺžka',
                'slug' => 'length',
                'items' => [
                    ['title' => 'Milimeter', 'slug' => 'millimeter', 'symbol' => 'mm', 'coefficient' => '1', 'basic' => '1'],
                    ['title' => 'Centimeter', 'slug' => 'centimeter', 'symbol' => 'cm', 'coefficient' => '10', 'basic' => '0'],
                    ['title' => 'Palec', 'slug' => 'inch', 'symbol' => 'in', 'coefficient' => '25.4', 'basic' => '0'],
                    ['title' => 'Decimeter', 'slug' => 'decimeter', 'symbol' => 'dm', 'coefficient' => '100', 'basic' => '0'],
                    ['title' => 'Stopa', 'slug' => 'foot', 'symbol' => 'ft', 'coefficient' => '304.8', 'basic' => '0'],
                    ['title' => 'Yard', 'slug' => 'yard', 'symbol' => 'yd', 'coefficient' => '914.4', 'basic' => '0'],
                    ['title' => 'Meter', 'slug' => 'meter', 'symbol' => 'm', 'coefficient' => '1000', 'basic' => '0'],
                    ['title' => 'Kilometer', 'slug' => 'kilometer', 'symbol' => 'km', 'coefficient' => '1000000', 'basic' => '0'],
                    ['title' => 'Míľa', 'slug' => 'mile', 'symbol' => 'ml', 'coefficient' => '1609340', 'basic' => '0'],
                ],
            ],
            [
                'title' => 'Hmotnosť',
                'slug' => 'weight',
                'items' => [
                    ['title' => 'Miligram', 'slug' => 'milligram', 'symbol' => 'mg', 'coefficient' => '0.001', 'basic' => '0'],
                    ['title' => 'Gram', 'slug' => 'gram', 'symbol' => 'g', 'coefficient' => '1', 'basic' => '1'],
                    ['title' => 'Dekagram', 'slug' => 'decagram', 'symbol' => 'dkg', 'coefficient' => '10', 'basic' => '0'],
                    ['title' => 'Libra', 'slug' => 'libra', 'symbol' => 'lb', 'coefficient' => '453.592', 'basic' => '0'],
                    ['title' => 'Kilogram', 'slug' => 'kilogram', 'symbol' => 'kg', 'coefficient' => '1000', 'basic' => '0'],
                    ['title' => 'Tona', 'slug' => 'tonne', 'symbol' => 't', 'coefficient' => '1000000', 'basic' => '0'],
                ],
            ],
            [
                'title' => 'Objem',
                'slug' => 'volume',
                'items' => [
                    ['title' => 'Mililiter', 'slug' => 'milliliter', 'symbol' => 'ml', 'coefficient' => '1', 'basic' => '1'],
                    ['title' => 'Centiliter', 'slug' => 'centiliter', 'symbol' => 'cl', 'coefficient' => '10', 'basic' => '0'],
                    ['title' => 'Deciliter', 'slug' => 'deciliter', 'symbol' => 'dl', 'coefficient' => '100', 'basic' => '0'],
                    ['title' => 'Liter', 'slug' => 'liter', 'symbol' => 'l', 'coefficient' => '1000', 'basic' => '0'],
                    ['title' => 'Galón US', 'slug' => 'gallon-us', 'symbol' => 'gal', 'coefficient' => '3785', 'basic' => '0'],
                    ['title' => 'Galón UK', 'slug' => 'gallon-uk', 'symbol' => 'gal', 'coefficient' => '4546', 'basic' => '0'],
                    ['title' => 'Hektoliter', 'slug' => 'hectoliter', 'symbol' => 'hl', 'coefficient' => '100000', 'basic' => '0'],
                    ['title' => 'Barel', 'slug' => 'barrel', 'symbol' => 'bl', 'coefficient' => '158987', 'basic' => '0'],
                    ['title' => 'Meter kubický', 'slug' => 'cubic-metre', 'symbol' => 'm³', 'coefficient' => '1000000', 'basic' => '0'],
                ],
            ],
            [
                'title' => 'Plocha',
                'slug' => 'area',
                'items' => [
                    ['title' => 'Milimeter štvorcový', 'slug' => 'square-millimeter', 'symbol' => 'mm²', 'coefficient' => '0.000001', 'basic' => '0'],
                    ['title' => 'Centimeter štvorcový', 'slug' => 'square-centimeter', 'symbol' => 'cm²', 'coefficient' => '0.0001', 'basic' => '0'],
                    ['title' => 'Palec štvorcový', 'slug' => 'square-inch', 'symbol' => 'sq in', 'coefficient' => '0.00064516', 'basic' => '0'],
                    ['title' => 'Decimeter štvorcový', 'slug' => 'square-decimeter', 'symbol' => 'dm²', 'coefficient' => '0.01', 'basic' => '0'],
                    ['title' => 'Stopa štvorcová', 'slug' => 'square-foot', 'symbol' => 'sq ft', 'coefficient' => '0.092903', 'basic' => '0'],
                    ['title' => 'Yard štvorcový', 'slug' => 'square-yard', 'symbol' => 'sq yd', 'coefficient' => '0.836127', 'basic' => '0'],
                    ['title' => 'Meter štvorcový', 'slug' => 'square-meter', 'symbol' => 'm²', 'coefficient' => '1', 'basic' => '1'],
                    ['title' => 'Ár', 'slug' => 'are', 'symbol' => 'a', 'coefficient' => '100', 'basic' => '0'],
                    ['title' => 'Aker', 'slug' => 'acre', 'symbol' => 'ac', 'coefficient' => '4046.86', 'basic' => '0'],
                    ['title' => 'Hektár', 'slug' => 'hectare', 'symbol' => 'ha', 'coefficient' => '10000', 'basic' => '0'],
                    ['title' => 'Kilometer štvorcový', 'slug' => 'square-kilometer', 'symbol' => 'km²', 'coefficient' => '1000000', 'basic' => '0'],
                    ['title' => 'Míľa štvorcová', 'slug' => 'square-mile', 'symbol' => 'mile²', 'coefficient' => '2589990', 'basic' => '0'],
                ],
            ],
            [
                'title' => 'Množstvo',
                'slug' => 'quantity',
                'items' => [
                    ['title' => 'Balenie', 'slug' => 'packaging', 'symbol' => 'bal.', 'coefficient' => '1', 'basic' => '0'],
                    ['title' => 'Kus', 'slug' => 'piece', 'symbol' => 'ks', 'coefficient' => '1', 'basic' => '1'],
                    ['title' => 'Pár', 'slug' => 'pair', 'symbol' => 'pár', 'coefficient' => '1', 'basic' => '0'],
                    ['title' => 'Paleta', 'slug' => 'palette', 'symbol' => 'pal.', 'coefficient' => '1', 'basic' => '0'],
                ],
            ],
            [
                'title' => 'Energia',
                'slug' => 'energy',
                'items' => [
                    ['title' => 'Megawatt hodina', 'slug' => 'megawatt-hour', 'symbol' => 'MWh', 'coefficient' => '0.001', 'basic' => '0'],
                    ['title' => 'Giga joule', 'slug' => 'giga-joules', 'symbol' => 'GJ', 'coefficient' => '0.0036', 'basic' => '0'],
                    ['title' => 'Kilowatt hodina', 'slug' => 'kilowatt-hour', 'symbol' => 'kWh', 'coefficient' => '1', 'basic' => '1'],
                    ['title' => 'Mega joule', 'slug' => 'mega-joule', 'symbol' => 'MJ', 'coefficient' => '3.6', 'basic' => '0'],
                    ['title' => 'Kilo kalórie', 'slug' => 'kilo-calories', 'symbol' => 'kcal', 'coefficient' => '860.2151', 'basic' => '0'],
                    ['title' => 'Kilo joule', 'slug' => 'kilo-joule', 'symbol' => 'kJ', 'coefficient' => '3600', 'basic' => '0'],
                    ['title' => 'Kalória', 'slug' => 'calorie', 'symbol' => 'cal', 'coefficient' => '860215.0538', 'basic' => '0'],
                    ['title' => 'Joule', 'slug' => 'joule', 'symbol' => 'J', 'coefficient' => '3600000', 'basic' => '0'],
                ],
            ],
        ];

        foreach ($items as $item) {
            $groupData = [
                'title' => $item['title'],
                'slug' => $item['slug'],
                'status' => '1',
            ];

            $group = UnitGroup::updateOrCreate(['slug' => $item['slug']], $groupData);

            foreach ($item['items'] as $key => $itemData) {
                $itemData['group_id'] = $group->id;
                $itemData['sort'] = $key + 1;

                Unit::updateOrCreate(['slug' => $itemData['slug']], $itemData);
            }
        }
    }
}
