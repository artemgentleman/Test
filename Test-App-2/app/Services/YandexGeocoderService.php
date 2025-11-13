<?php

namespace App\Services;

class YandexGeocoderService
{
    public string $url;

    public function __construct(string $query)
    {
        $this->url = 'https://geocode-maps.yandex.ru/v1/?apikey=9db1e0f6-22fd-46fe-bdc3-5cc1fcecb2f7'
            . '&geocode=' . urlencode($query)
            . '&results=5&format=json';
    }

    public function getGeocodedAddressData() : array
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            return ['error' => 'Ошибка запроса: ' . curl_error($ch)];
        } else {
            $data = json_decode($response, true);
        }

        curl_close($ch);

        return $data;
    }

    public function getGeocodedAddress(array $data) : array
    {
        if (empty($data['response']['GeoObjectCollection']['featureMember'])) {
            return ['message' => 'No results found'];
        }
        $results = [];
        foreach ($data['response']['GeoObjectCollection']['featureMember'] as $item) {
            $metaData = $item['GeoObject']['metaDataProperty']['GeocoderMetaData'];
            $results[] = [
                'address' => $metaData['text'],
            ];
        }
        return $results;
    }
}
