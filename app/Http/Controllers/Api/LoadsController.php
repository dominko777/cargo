<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoadResource;
use App\Load;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoadsController extends Controller
{
    public function getLoads(Request $request)
    {
        $loads = Load::with(['fromCity', 'toCity']);
        if ($request->from) {
            $loads->whereHas('fromCity', function($query) use ($request) {
                $query->where('slug', $request->from);
            });
        }
        $loads = $loads->get();
        foreach ($loads as &$load) {
            $load->fromCityName = $load->fromCity->name;
            $load->toCityName = $load->toCity->name;
            $load->photo = Storage::url($load->photo);
        }
        return LoadResource::collection($loads);
    }

}
