<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Load;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class LoadsController extends Controller
{
    public function getLoads(Request $request)
    {
        if ($request->lang) {
            app()->setLocale($request->lang);
        } else {
            $request->lang = app()->getLocale();
        }
        $loads = Load::with(['fromCity', 'toCity']);
        if ($request->from) {
            $from = ucfirst(str_replace(' ', '%20', $request->from));
            $loads->leftJoin('cities AS fromCityTable', 'fromCityTable.id', '=', 'loads.city_from_id');
            $loads->where("fromCityTable.name->en", $from);
        }
        $loads = $loads->get();
        foreach ($loads as &$load) {
            $load->fromCity = $load->fromCity->name;
            $load->toCity = $load->toCity->name;
            $load->photo = url('/') . Storage::url('/images/' . $load->photo);
        }
        return $loads;
    }

}
