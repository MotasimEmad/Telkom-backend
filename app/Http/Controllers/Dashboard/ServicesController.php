<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.services.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        request()->validate([
//            'en_name' => 'required',
//            'ar_name' => 'required',
//        ], [
//            'en_name.required' => 'The en category name is required.',
//            'ar_name.required' => 'The ar category name is required.',
//        ]);

        try {
            $service = new Service();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->storeAs('public/images/services', $filename);
                Storage::setVisibility('public/images/services/' . $filename, 'public');
                $service['image'] = $filename;
            }

            $service->name = $request->name;
            $service->description = $request->description;
            $service->save();

            return redirect()->back()->withSuccess("Service has been added successfully");
        } catch (\Throwable $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('dashboard.services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        request()->validate([
//            'en_name' => 'required',
//            'ar_name' => 'required',
//        ], [
//            'en_name.required' => 'The en category name is required.',
//            'ar_name.required' => 'The ar category name is required.',
//        ]);

        try {
            $service = Service::find($id);
            if ($request->hasFile('image')) {
                if (Storage::exists('public/images/services/' . $service->image)) {
                    Storage::delete('public/images/services/' . $service->image);
                }

                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->storeAs('public/images/services', $filename);
                Storage::setVisibility('public/images/services/' . $filename, 'public');
                $service['image'] = $filename;
            }

            $service->name = $request->name;
            $service->description = $request->description;
            $service->save();

            return redirect()->back()->withSuccess("Service has been updated successfully");
        } catch (\Throwable $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $service = Service::find($id);

            if (Storage::exists('public/images/services/' . $service->image)) {
                Storage::delete('public/images/services/' . $service->image);
            } else {
                return redirect()->back()->withErrors("No image found !");
            }
            $service->delete();
            return redirect()->route('services.index')->withSuccess("Service has been deleted successfully");
        } catch (\Throwable $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
