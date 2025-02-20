@extends('layouts.app')

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_2.jpg')}}" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">All Requests for Propreties</h1>
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section site-section-sm bg-light">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2>All Requests for Propreties</h2>
            </div>
          </div>
        </div>
      
        <div class="row mb-5">

        @if ($allRequests->count() > 0)

        @foreach ($allRequests as $relateProp )
          <div class="col-md-6 col-lg-4">
            <div class="property-entry h-100">
              <a href="{{route('single.prop',$relateProp->prop_id)}}" class="btn btn-success">
                Go to this proprety
              </a>

            </div>
          </div>   
        @endforeach
        @else

        <h3 class="alert alert-success"> they are not Requests just yet</h3>
            
        @endif

         
        </div>
      </div>

@endsection