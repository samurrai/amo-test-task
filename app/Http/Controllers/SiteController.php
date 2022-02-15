<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    private function auth()
    {
        $url = 'https://test.gnzs.ru/oauth/get-token.php';
        $xClientId = '29982469';

        $response = Http::withHeaders([
            'X-Client-Id' => $xClientId
        ])->get($url);

        return $response;
    }

    public function createEntity(Request $request)
    {
        $entityTypes = [
            'leads' => 'Сделка',
            'contacts' => 'Контакт',
            'companies' => 'Компания'
        ];

        $authData = $this->auth();
        $accessToken = $authData['access_token'];
        $baseDomain = $authData['base_domain'];
        $entityKey = $request->entity_key;

        $url = "https://" . $baseDomain . "/api/v4/";
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken
        ])->post($url . $entityKey, ['name' => [$entityKey]]);

        $entityObj = [
            'id' => $response['_embedded'][$entityKey][0]['id'],
            'entity_type' => $entityTypes[$entityKey]
        ];
        return response($entityObj);
    }
}
