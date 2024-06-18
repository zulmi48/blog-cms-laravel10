<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'blogname',
                'value' => 'Laravel CMS'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome to Laravel Blog!'
            ],
            [
                'name' => 'caption',
                'value' => 'A Bootstrap 5 starter layout for your next blog homepage'
            ],
            [
                'name' => 'ads_header',
                'value' => 'Adsense 1'
            ],
            [
                'name' => 'ads_widget',
                'value' => 'Adsense 2'
            ],
            [
                'name' => 'ads_footer',
                'value' => 'Adsense 3'
            ],
            [
                'name' => 'phone',
                'value' => '+62888888888'
            ],
            [
                'name' => 'email',
                'value' => 'zulmi@example.com'
            ],
            [
                'name' => 'facebook',
                'value' => 'facebook.com'
            ],
            [
                'name' => 'instagram',
                'value' => 'instagram.com'
            ],
            [
                'name' => 'youtube',
                'value' => 'youtube.com'
            ],
            [
                'name' => 'footer',
                'value' => 'Laravel Blog'
            ],
        ]);
    }
}
