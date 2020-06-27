<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting;
        $setting->name = 'Pizza Haus';
        $setting->logo = 'https://via.placeholder.com/50x50';
        $setting->delivery_fees = 12;
        $setting->footer = 'Welcome to Pizza Haus';
        $setting->save();
    }
}
