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
                'description' => 'Tágas, világos közösségi tér, ahol a család vagy a baráti társaság kényelmesen összegyűlhet. A modern konyha teljesen felszerelt (mosogatógép, sütő, mikrohullámú sütő, kávéfőző), így egy kiadós reggeli vagy egy ünnepi vacsora elkészítése is gyerekjáték. A kényelmes kanapékon pihenve pedig senki sem marad ki a közös beszélgetésekből.'
            ],
            [
                'section_name' => 'family_zone',
                'title' => 'Családi pihenőzóna',
                'description' => 'A nappaliból nyíló két különálló hálószoba tökéletes választás szülőknek és gyerekeknek egyaránt. Az egyik szobában egy franciaágy és egy masszív emeletes ágy kapott helyet a kicsik legnagyobb örömére, míg a másik egy kuckós, csendes háló franciaággyal. Közel egymáshoz, mégis biztosítva a privát szférát a pihentető éjszakákhoz.'
            ],
            [
                'section_name' => 'master_bedroom',
                'title' => 'A "Nagy Háló"',
                'description' => 'A ház külön szárnyában, a nyüzsgéstől elzárva kapott helyet a legfőbb hálószoba. Ez a tágas, elegáns tér kényelmes franciaággyal, egy masszív emeletes ággyal, gardróbbal és egy saját, közvetlen bejáratú (en-suite) fürdőszobával rendelkezik. Egy igazi kis privát birodalom azoknak, akik a legnagyobb kényelemre vágynak.'
            ],
            [
                'section_name' => 'bath',
                'title' => 'Közös használatú és privát fürdőszoba',
                'description' => 'Vendégházunkban két igényesen kialakított, zuhanyzós fürdőszoba szolgálja a vendégek kényelmét. A tiszta, letisztult terekben friss törölközők, mosógép és alapvető tisztálkodási szerek is rendelkezésre állnak, hogy Önnek már tényleg csak a pihenésre kelljen koncentrálnia.'
            ],
        ];

        foreach ($rooms as $room) {
            RoomContent::firstOrCreate(['section_name' => $room['section_name']], $room);
        }
    }
}
