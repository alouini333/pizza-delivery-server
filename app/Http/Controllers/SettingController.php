<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Utils\Utils;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {   
        try {
            $settings = Setting::first();
            return Utils::returnData($settings);
        } catch (\Excecption $e) {
            return Utils::handleException($e);
        }
    }
}
