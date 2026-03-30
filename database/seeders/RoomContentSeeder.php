<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomContent;

class RoomContentSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'section_name' => 'living_room',
                'title' => 'Amerikai konyhás étkező és nappali',
                'description' => 'Tágas, világos közösségi tér, ahol a család vagy a baráti társaság kényelmesen együtt lehet. A konyha teljesen felszerelt (mosogatógép, sütő, mikró, kávéfőző).'
            ],
            [
                'section_name' => 'family_zone',
                'title' => 'Családi pihenőzóna',
                'description' => 'A közösségi térből nyíló két egybenyíló/szeparált hálószoba, amely tökéletes nyugodalmat biztosít a gyermekes családok számára.'
            ],
            [
                'section_name' => 'master_bedroom',
                'title' => 'A "Nagy Háló"',
                'description' => 'Különálló, tágas hálószoba a ház csendesebb részén, kényelmes franciaággyal és gardróbbal, a maximális kényelemért.'
            ],
            [
                'section_name' => 'bath',
                'title' => 'Közös használatú és privát fürdőszoba',
                'description' => 'Modern, tiszta fürdőszoba zuhanyzóval, - a közös használatú helyiségben - mosógéppel és alapvető tisztálkodási szerekkel ellátva.'
            ],
        ];

        foreach ($rooms as $room) {
            RoomContent::firstOrCreate(['section_name' => $room['section_name']], $room);
        }
    }
}
