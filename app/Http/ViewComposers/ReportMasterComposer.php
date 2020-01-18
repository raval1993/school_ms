<?php

namespace App\Http\ViewComposers;
use App\Http\Helpers\AppHelper;
use Illuminate\Contracts\View\View;

class ReportMasterComposer
{
    public function compose(View $view)
    {

        // get app settings
        $instituteSettings = AppHelper::getAppSettings('institute_settings');
        $instituteName = '';
        $instituteAddress = '';
        if($instituteSettings) {
            $instituteName = $instituteSettings['name'] ??  '';
            $instituteAddress = $instituteSettings['address'] ??  '';
            $logo = $instituteSettings['logo'] ??  '';
        }

        $view->with('maintainer', 'ASRG Technology');
        $view->with('maintainer_url', 'http://asrgtechnology.com');
        $view->with('majorVersion', '2');
        $view->with('minorVersion', '0');
        $view->with('instituteName', $instituteName);
        $view->with('instituteAddress', $instituteAddress);
        $view->with('logo', $logo);
        $view->with('showLogo', AppHelper::getAppSettings('report_show_logo'));
        $view->with('background_color', AppHelper::getAppSettings('report_background_color'));
        $view->with('text_color', AppHelper::getAppSettings('report_text_color'));

    }
}