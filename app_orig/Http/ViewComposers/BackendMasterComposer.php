<?php

namespace App\Http\ViewComposers;
use App\Http\Helpers\AppHelper;
use Illuminate\Contracts\View\View;

class BackendMasterComposer
{
    public function compose(View $view)
    {

        // get app settings
        $appSettings = AppHelper::getAppSettings(null, true);

        $view->with('frontend_website', 1);
        $view->with('show_language', 1);
        if (!isset($appSettings['frontend_website']) or $appSettings['frontend_website'] == '0') {
            $view->with('frontend_website', 0);
        }
        if (!isset($appSettings['disable_language']) or $appSettings['disable_language'] == '1') {
            $view->with('show_language', 0);
        }

        $view->with('locale', 'en');
        if (isset($appSettings['language']) && $appSettings['language'] != '') {
            $view->with('locale', $appSettings['language']);
        }


        $view->with('maintainer', 'Gaurav Raval');
        $view->with('maintainer_url', 'http://asrgtechnology.com');
        $view->with('majorVersion', '2');
        $view->with('minorVersion', '0');
        $view->with('appSettings', $appSettings);
        $view->with('languages', AppHelper::LANGUEAGES);
        $view->with('idc', 'be7fc4874ef23eae4b9b43aa856f9c914891e8e7');  //cc4a289fb295083729fb68ec7529a742401bbfa2
        $view->with('institute_category', AppHelper::getInstituteCategory());
    }
}