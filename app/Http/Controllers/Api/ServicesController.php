<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesCollection;
use App\Models\Service;

class ServicesController extends Controller
{

    public function get_top_services()
    {
        try {
            $all_services = ServicesCollection::collection(Service::orderBy('created_at', 'desc')->limit(5)->get());
            return response()->success($all_services);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }

    public function get_services()
    {
        try {
            $all_services = ServicesCollection::collection(Service::orderBy('created_at', 'desc')->get())->paginate(env('PAGINATE'));
            return response()->success($all_services);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }

    public function get_service_by_id($id)
    {
        try {
            $service = ServicesCollection::collection(Service::where('id', $id)->get())->first();
            return response()->success($service);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }
}
