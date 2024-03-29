<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Products"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Stock</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Stock ID</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Product Name</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Quantity</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Unit Of Measurement</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Selling Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        <tr>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{$stock->id}}</p>
            </td>
            <td>
                <div class="d-flex px-2 py-1">
                    <div>
                        <!-- Display your product image here -->
                        <img src="{{ asset('assets') }}/img/team-2.jpg"
                            class="avatar avatar-sm me-3 border-radius-lg" alt="product-image">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$stock->name}}</h6>
                    </div>
                </div>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{$stock->quantity}}</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{$stock->unit_of_measurement}}</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0">{{$stock->selling_price}}</p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
