<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index', [
            'setting' => $setting
        ]);
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->mobile = $request->mobile;
        $setting->is_whatsapp_enable = $request->is_whatsapp_enable === "1";
        $setting->save();

        return redirect()->back()->withSuccess("Settings has been updated successfully");
    }
}
