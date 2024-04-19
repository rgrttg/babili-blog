<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tag;

class TagSeeder extends Seeder
{
    


    public $tags = ['Tech', 'Wissen', 'Hilfe', 'Events','Jobs','Projekte','Stories'];


    public function run(): void
    {
        foreach($this->tags as $tag){
            Tag::create([
                'tag' => $tag   
            ]);
        }
    }
}
