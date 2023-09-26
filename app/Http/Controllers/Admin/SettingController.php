<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $setting  = setting('general_settings') ?? NULL;
        $projects  = setting('projects') ?? NULL;
        return view('admin.settings.general_setting', compact('setting', 'projects'));
    }

    public function store(Request $request)
    {
        $setting    = !empty(setting('general_settings')) ? setting('general_settings')->option_value : NULL;
        $option_value = array(
            'app_name'     => $request->input('app_name'),
            'support_email' => $request->input('support_email'),
            'support_phone' => $request->input('support_phone'),
            'company_address' => $request->input('company_address'),
            // banner section

            'banner_heading' => $request->input('banner_heading'),
            'banner_subheading' => $request->input('banner_subheading'),

            'banner_action_name1' => $request->input('banner_action_name1'),
            'banner_action_name2' => $request->input('banner_action_name2'),
            'banner_action_url1' => $request->input('banner_action_url1'),
            'banner_action_url2' => $request->input('banner_action_url2'),

            // about section
            'about'                => $request->input('about'),

            'number_of_projects'   => $request->input('number_of_projects'),
            'years_of_experience'  => $request->input('years_of_experience'),
            'winning_awards'       => $request->input('winning_awards'),
            'happy_clients'        => $request->input('happy_clients'),
        );

        if ($request->hasFile('about_main_image')) {
            $option_value['about']['main_image'] = $request->file('about_main_image')->store('uploads/about', 'public');
        } else {
            $option_value['about']['main_image'] = $setting['about']['main_image'] ?? NULL;
        }

        if ($request->hasFile('about_thumbnail')) {
            $option_value['about']['thumbnail'] = $request->file('about_thumbnail')->store('uploads/about', 'public');
        } else {
            $option_value['about']['thumbnail'] = $setting['about']['main_image'] ?? NULL;
        }

        if ($request->hasFile('logo')) {
            $option_value['logo'] = $request->file('logo')->store('uploads/logo', 'public');
        } else {
            $option_value['logo'] = $setting['logo'] ?? NULL;
        }

        if ($request->hasFile('mobile_logo')) {
            $option_value['mobile_logo'] = $request->file('mobile_logo')->store('uploads/logo', 'public');
        } else {
            $option_value['mobile_logo'] = $setting['mobile_logo'] ?? NULL;
        }

        if ($request->hasFile('favicon')) {
            $option_value['favicon'] = $request->file('favicon')->store('uploads/logo', 'public');
        } else {
            $option_value['favicon'] = $setting['favicon'] ?? NULL;
        }

        if ($request->hasFile('banner')) {
            $option_value['banner'] = $request->file('banner')->store('uploads/banner', 'public');
        } else {
            $option_value['banner'] = $setting['banner'] ?? NULL;
        }
        // return $option_value;

        Setting::updateOrCreate(['id' => $request->input('RecordId')], [
            'option_key'   => 'general_settings',
            'option_value' => $option_value
        ]);

        return back()->withSuccess('SUCCESS !! Setting is successfully updated');
    }
}
