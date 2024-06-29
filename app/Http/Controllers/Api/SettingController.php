<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingCollection;
use App\Models\Setting;

class SettingController extends Controller
{
    public function settings()
    {
        try {
            $settings = SettingCollection::collection(Setting::all())->first();
            return response()->success($settings);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }
}
