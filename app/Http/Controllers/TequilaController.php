<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TequilaController extends Controller
{
    public function search(Request $request)
    {
        // dd($request->all());
        $client = new Client();

        // Build query parameters
        $queryParams = [
            'fly_from' => $request->input('origin'),
            'fly_to' => $request->input('destination'),
            'date_from' => $request->input('departure_date'),
            'adults' => $request->input('adults'),
            'cabin_class' => $request->input('cabin'),
            'curr' => 'PHP',
            'sort' => 'date',
        ];

        // Check if flight type is one-way
        if ($request->input('return-date') === 'null') {
            unset($queryParams['return_date']);
        }
        if ($request->input('children') > 0) {
            $query['children'] = $request->input('children');
        }

        if ($request->input('infants') > 0) {
            $query['infants'] = $request->input('infants');
        }


        $response = $client->request('GET', 'https://tequila-api.kiwi.com/v2/search', [
            'headers' => [
                'apikey' => '6Aza-WT-XSLi6PfODs0OZgDuG3zVt_zS',
            ],
            'query' => $queryParams,
        ]);

        $data = json_decode($response->getBody(), true);
        // Check if the response data contains at least one search result
        if (isset($data['data']) && is_array($data['data']) && count($data['data']) > 0) {
            // Extract the price, currency, departure time, and arrival time from the response data
            $price = $data['data'][0]['price'];
            $currency = $data['currency'];

            $itinerary = $data['data'][0];
            $segments = $itinerary['route'];
            $departureTime = $segments[0]['local_departure'];
            $arrivalTime = $segments[count($segments) - 1]['local_arrival'];

            // Extract the airline name and whether the flight is direct or not
            $airline = $segments[0]['airline'];
            $isDirect = true;
            for ($i = 0; $i < count($segments); $i++) {
                if (isset($segments[$i]['stopovers'])) {
                    $isDirect = false;
                    break;
                }
            }

            // Add the price, currency, departure time, arrival time, airline name, and direct flight information to the data array and return it to the view
            $data['price'] = $price;
            $data['currency'] = $currency;
            $data['departure_time'] = $departureTime;
            $data['arrival_time'] = $arrivalTime;
            $data['airline'] = $airline;
            $data['is_direct'] = $isDirect;

            // dd($data);
            return view('landing_page.search_result', ['data' => $data]);
        } else {
            // Handle the error case here, e.g. display an error message to the user
            return view('landing_page.search_error');
        }
    }
}
