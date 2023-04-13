<div class="hero-search-form">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab"> @section('content')
            <h1>Search Results</h1>

            @if (count($data) === 0)
            <p>No flights found.</p>
            @else
            @foreach ($data['data'] as $flight)
            <div class="card text-left">
                <div class=" card-header">
                    {{$formattedDate = date('l, F j, Y', strtotime($flight['local_departure']));}}
                </div>
                <div class="card-body">
                    @foreach ($flight['route'] as $segment)
                    <h4>Flight Details</h4>
                    <p class="price">{{ $data['currency'] }} {{ $data['price'] }}</p>
                    <ul>
                        @if (isset($segment['airline']) && isset($segment['flight_no']))
                        operated by {{ $segment['airline'] }} ({{ $segment['flight_no'] }})
                        @endif
                        <li>{{ $segment['cityFrom'] }} ({{ $segment['flyFrom'] }}) to {{ $segment['cityTo'] }} ({{ $segment['flyTo'] }}) - {{ date('h:i A', strtotime($segment['local_departure'])) }} to {{ date('h:i A', strtotime($segment['local_arrival'])) }}</li>
                        @if ($data['is_direct'])
                        <p>Direct Flight: Yes</p>
                        @else
                        <p>Direct Flight: No</p>
                        @endif
                        <p>Cabin: {{ $segment['vehicle_type'] }}</p>
                        @endforeach
                    </ul>
                    <a href="#" class="btn dorne-btn search-btn" style="float:right;">Select</a>
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>
            <br>
            @endforeach
            <!-- <table>
                <thead>
                    <tr>
                        <th>Airline</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Duration</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['data'] as $flight)
                    <tr>
                        <td>{{ $flight['airlines'][0] }}</td>
                        <td>{{ $flight['route'][0]['flyFrom'] }} - {{ $flight['route'][0]['cityFrom'] }}</td>
                        <td>{{ $flight['route'][count($flight['route']) - 1]['flyTo'] }} - {{ $flight['route'][count($flight['route']) - 1]['cityTo'] }}</td>
                        <td>
                            @if (isset($segment['arrival']))
                            {{ $segment['arrival']['city'] }} ({{ $segment['arrival']['code'] }}) {{ $segment['arrival']['time'] }}
                            @else
                            Unknown
                            @endif
                        </td>
                        <td>
                            @if (isset($flight['price']['currency']))
                            {{ $flight['price']['currency'] }} {{ $flight['price']['amount'] }}
                            @else
                            Unknown
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> -->
            @endif
        </div>
    </div>
</div>