<?php

namespace App\Http\Controllers\Ap;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::pluck('value','key');
        return view('pages/Ap.settings.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        foreach ($request->setting as $key => $value) {
            if ($key == 'logo') {
                if ($request->hasFile('setting.logo')) {
                    $setting = Setting::where('key', $key)->firstOrFail();
                    if ($setting->value) {
                        unlink(public_path('images/setting/' . $setting->value));
                    }
                    $file = $request->file('setting.logo');
                    $destinationPath = public_path('/images/setting/');
                    $value = $file->getClientOriginalName();
                    $file->move($destinationPath, $value);
                }
            }
            if ($key == 'favicon') {
                // dd($request->file());
                if ($request->hasFile('setting.favicon')) {
                    $setting = Setting::where('key', $key)->firstOrFail();
                    if ($setting->value) {
                        unlink(public_path('images/setting/' . $setting->value));
                    }
                    $file = $request->file('setting.favicon');
                    $destinationPath = public_path('/images/setting/');
                    $value = $file->getClientOriginalName();
                    $file->move($destinationPath, $value);
                }
            }
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('ap.settings.index', $setting)->with('success', 'Setting berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
