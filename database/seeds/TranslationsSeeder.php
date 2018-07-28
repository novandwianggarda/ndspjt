<?php

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class TranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // LEASE
        $tranlations = getTranslations('lease');
        foreach ($tranlations as $index => $translation) {
            LanguageLine::create([
                'group' => 'lease',
                'key' => $index,
                'text' => $translation,
            ]);
        }

        // CERTIFICATE
        // $tranlations = getTranslations('certificate');
        // foreach ($tranlations as $index => $translation) {
        //     LanguageLine::create([
        //         'group' => 'certificate',
        //         'key' => $index,
        //         'text' => $translation,
        //     ]);
        // }
    }
}
