<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesCollection;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function get_top_services()
    {
        try {
            $all_services = ServicesCollection::collection(Service::orderBy('created_at', 'desc')->limit(4)->get());
            return response()->json([
                'data' => $all_services->values(),
            ]);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }

    public function get_services()
    {
        try {
            $all_services = ServicesCollection::collection(Service::orderBy('created_at', 'desc')->get());
            return response()->json([
                'data' => $all_services->values(),
            ]);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }

    public function get_service_by_id(Request $request)
    {
        try {
            $service = ServicesCollection::collection(Service::where('id', $request->query('id'))->get())->first();
            return response()->success($service);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }
}
