<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class ZohoController extends Controller
{
    public function importLeads(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://accounts.zoho.com/oauth/v2/token', [
            'form_params' => [
                'refresh_token' => '1000.e88784e95f088cf596ab3655cc4bdfc6.98d4fe1fb26d20e3bd9461ac17a8715a',
                'client_id' => '1000.HL84XZ32EYBFW2PQMQ5FSSR38VVE0G',
                'client_secret' => 'b8d93e9db3c81109629d6dbc7fd37577300d318aed',
                'grant_type' => 'refresh_token',
            ]
        ]);

        $response=json_decode($response->getBody()->getContents());
        // dd($response->access_token);

        $response = $client->request('GET', 'https://www.zohoapis.com/crm/v2/Leads', [
            'headers'=>[
                'Authorization'=>'Zoho-oauthtoken '.$response->access_token
            ]
        ]);
        $response=json_decode($response->getBody()->getContents());
        dd($response->data);

        // foreach($response->data as $item){
        //     Lead::create([
        //         ''
        //     ]);
        // }
    }
}
