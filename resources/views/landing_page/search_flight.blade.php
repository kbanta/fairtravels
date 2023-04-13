<div class="hero-search-form">
    <!-- Tabs Content -->
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
            <form id="search-form">
                <h3 style="color: #fff;">Search Flights</h3>
                <div class="row">
                    <!-- <div class="form-group col-lg-2 align-items-start flex-column pt-lg-4">
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" type="checkbox" id="directFlights">
                            <label class="custom-control-label" for="directFlights">Direct
                                flights</label>
                        </div>
                    </div> -->
                    <div class="nav-item dropdown" style="width: 120px;">
                        <a class="nav-link dropdown-toggle" style="color:white;width:200px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Passengers
                            </i></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="passengers" onclick="event.stopPropagation()" style="background-color: rgba(67, 25, 161, 0.65);width:290px;" data-toggle="false">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" style="width:140px;" for="adults">Adults :<span class="sublabel"> 12+
                                        </span></label>
                                    <select class="form-select" id="adults" name="adults">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                    <button class="btn btn-success" type="button" onclick="increment('adults')">+</button>
                                    <button class="btn btn-danger" type="button" onclick="decrement('adults')">-</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" style="width:140px;" for="children">Children:<span class="sublabel"> 2-11
                                        </span></label>
                                    <select class="form-select" id="children" name="children">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                    <br>
                                    <button class="btn btn-success" type="button" onclick="increment('children')">+</button>
                                    <button class="btn btn-danger" type="button" onclick="decrement('children')">-</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" style="width: 140px;" for="infants">Infants: <span class="sublabel"> less than
                                            2</span></label>
                                    <select class="form-select" id="infants" name="infants">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <button class="btn btn-success" type="button" onclick="increment('infants')">+</button>
                                    <button class="btn btn-danger" type="button" onclick="decrement('infants')">-</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown" style="width: 120px;">
                        <a class="nav-link dropdown-toggle" style="color:white;width:200px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plane" aria-hidden="true"></i>
                            Flight Type
                            </i></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="passengers" onclick="event.stopPropagation()" style="background-color: rgba(67, 25, 161, 0.65);width:290px;" data-toggle="false">
                            <select class="custom-select" id="cabin" name="cabin">
                                <option value="ECONOMY">Economy</option>
                                <option value="PREMIUM_ECONOMY">Premium Economy</option>
                                <option value="BUSINESS">Business</option>
                                <option value="FIRST">First</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="origin" class="d-inline-flex">From</label>
                        <input type="text" placeholder="City or Airport" class="form-control" id="origin" name="origin" required>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="destination" class="d-inline-flex">To</label>
                        <input type="text" placeholder="City or Airport" class="form-control" id="destination" name="destination" required>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="departure-date" class=" d-inline-flex">Depart</label>
                        <input type="date" class="form-control" id="departure-date" name="departure-date" onkeydown="return false" required>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="return-date" class="d-inline-flex">Return</label>
                        <input type="date" placeholder="One way" value="" onChange="this.setAttribute('value', this.value)" class="form-control" id="return-date" name="return-date">
                    </div>
                </div>
                <div class="row">
                    <div class="text-left col-auto">
                        <!-- <button type="submit" class="btn btn-primary">Search flights</button> -->
                        <a href="#" class="btn dorne-btn search-btn"><i class="fa fa-sign-in" aria-hidden="true"></i> Search flights</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.search-btn').click(function(event) {
            event.preventDefault();
            if ($("#search-form")[0].checkValidity()) {
                $.ajax({
                    url: 'home/tequila/search',
                    type: 'GET',
                    data: $("#search-form").serialize(),
                    success: function(data) {
                        // Display search results in the #search-results div
                        $('#search-results').html(data);
                        $(window).scrollTop($('#search-results').offset().top);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            } else {
                $("#search-form")[0].reportValidity();
            }
        });
    });

    $(document).ready(function() {
        // Get the country code from the fly_from parameter (assuming it's in ISO 3166-1 alpha-2 format)
        var country_code = 'PH';

        $('#origin, #destination').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: 'https://tequila-api.kiwi.com/locations/query',
                    headers: {
                        apikey: '6Aza-WT-XSLi6PfODs0OZgDuG3zVt_zS'
                    },
                    data: {
                        term: request.term,
                        locale: 'en-US',
                        active_only: true,
                        location_types: 'airport',
                        limit: 10,
                        sort: 'name',
                        radius: 1000,
                        type: 'id',
                        parents: country_code,
                    },
                    success: function(data) {
                        response($.map(data.locations, function(item) {
                            return {
                                label: item.name + ' (' + item.id + ')',
                                value: item.id,
                            }
                        }));
                    },
                });
            },
            minLength: 2,
        });
    });
</script>
<style>
    .form-group {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
        color: whitesmoke;
    }

    label {
        width: 100px;
        text-align: right;
        margin-right: 5px;
        margin-left: 5px;
    }

    .sublabel {
        color: gray;
        margin: 4px;
        font-size: 11px;
    }

    input[type="text"],
    input[type="date"] {
        padding: 10px;
        /* font-size: 14px; */
        height: 52px;
        border-radius: 0;
        /* padding: 0 80px 0 40px; */
        color: #72728c;
        font-size: 12px;
        font-weight: 600;
        border: none;
        width: 100%;
        /* margin-bottom: 30px; */
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #0050a0;
        border: none;
        cursor: pointer;
    }

    input[type="date"] {
        position: relative;
    }

    input[type="date"]:before {
        content: attr(placeholder);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        color: rgba(0, 0, 0, 0.65);
        pointer-events: none;
        line-height: 1.5;
        padding: 10px 0.5rem 0 0.5rem;
    }

    input[type="date"]:focus:before,
    input[type="date"]:not([value=""]):before {
        display: none;
    }

    .custom-bg {
        background-color: rgba(67, 25, 161, 0.65);
    }
</style>
<script>
    function dynamicDropDown(listIndex) {

        document.getElementById("infants").length = 0;
        document.getElementById("children").length = 0;

        for (let i = 0; i < Number(listIndex) + 1; i++) {
            document.getElementById("infants").options[i] = new Option(i.toString(), i);
        }

        for (let i = 0; i < 9 - Number(listIndex) + 1; i++) {
            document.getElementById("children").options[i] = new Option(i.toString(), i);
        }
    }
</script>
<script>
    function increment(id) {
        var dropdown = document.getElementById(id);
        var currentValue = parseInt(dropdown.value);
        if (currentValue < dropdown.options.length - 1) {
            dropdown.value = currentValue + 1;
        }
    }

    function decrement(id) {
        var dropdown = document.getElementById(id);
        var currentValue = parseInt(dropdown.value);
        if (currentValue > 0) {
            dropdown.value = currentValue - 1;
        }
    }
</script>