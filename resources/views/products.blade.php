@extends('layout.uapp')
@section('content')
    <main>



        <section class="">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                        <x-sidebar />
                        <div class="tpshop__widget">
                            <div class="tpshop__sidbar-thumb mt-35">
                                <img src="assets/img/shape/sidebar-product-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-12 col-md-12 mt-3">
                        <div class="row">

                            <div class="col-md-4 col-lg-3 col-12">
                                <a href="{{ route('product') }}" class="text-decoration-none text-dark">
                                    <div class="card border-0 bg-transparent">
                                        <img src="{{ asset('assets/images/1274-3.avif') }}" class="rounded-3" height="" alt="">
                                        <div class="card-body p-0">
                                            <h5 class="mt-2">{{ 'Glass Thing New items ' }}</h5>
                                            <p class=" fw-semibold">₦{{ '250,000' }}</p>
                
                                        </div>
                                    </div>
                                </a>
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>
        </section>
  
    </main>
@endsection
