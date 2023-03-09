<div class="hero-search-form">
    <!-- Tabs -->
    <div class="nav nav-tabs" id="heroTab" role="tablist">
        <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Places</a>
        <!-- <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">Events</a> -->
    </div>
    <!-- Tabs Content -->
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
            <h6>What are you looking for?</h6>
            <!-- resources/views/flights/search.blade.php -->
            <form action="#" method="get">
                <select class="custom-select">
                    <option selected>Your Destinations</option>
                    <option value="1">New York</option>
                    <option value="2">Latvia</option>
                    <option value="3">Dhaka</option>
                    <option value="4">Melbourne</option>
                    <option value="5">London</option>
                </select>
                <select class="custom-select">
                    <option selected>All Catagories</option>
                    <option value="1">Catagories 1</option>
                    <option value="2">Catagories 2</option>
                    <option value="3">Catagories 3</option>
                </select>
                <select class="custom-select">
                    <option selected>Price Range</option>
                    <option value="1">$100 - $499</option>
                    <option value="2">$500 - $999</option>
                    <option value="3">$1000 - $4999</option>
                </select>
                <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
            </form>
        </div>
        <!-- <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
            <h6>What are you looking for?</h6>
            <form action="#" method="get">
                <select class="custom-select">
                    <option selected>Your Destinations</option>
                    <option value="1">New York</option>
                    <option value="2">Latvia</option>
                    <option value="3">Dhaka</option>
                    <option value="4">Melbourne</option>
                    <option value="5">London</option>
                </select>
                <select class="custom-select">
                    <option selected>All Catagories</option>
                    <option value="1">Catagories 1</option>
                    <option value="2">Catagories 2</option>
                    <option value="3">Catagories 3</option>
                </select>
                <select class="custom-select">
                    <option selected>Price Range</option>
                    <option value="1">$100 - $499</option>
                    <option value="2">$500 - $999</option>
                    <option value="3">$1000 - $4999</option>
                </select>
                <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
            </form>
        </div> -->
    </div>
</div>