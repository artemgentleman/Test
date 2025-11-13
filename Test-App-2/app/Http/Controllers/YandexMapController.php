<?php

namespace App\Http\Controllers;

use App\Models\SearchQuery;
use App\Services\YandexGeocoderService;
use Illuminate\Http\Request;

class YandexMapController extends Controller
{
    public YandexGeocoderService $yandexGeocoderService;

    public function index(Request $request)
    {
        $query = $request->input('address');
        $query = 'Москва, ' . $query;
        $this->yandexGeocoderService = new YandexGeocoderService($query);
        $response = $this->yandexGeocoderService->getGeocodedAddress($this->yandexGeocoderService->getGeocodedAddressData());
        return $response;
    }
}
