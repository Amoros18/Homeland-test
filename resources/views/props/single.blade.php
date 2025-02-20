@extends('layouts.app')

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/'.$singleProp->image.'')}}" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
            <h1 class="mb-2">{{$singleProp->title}}</h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{$singleProp->price}}</strong></p>
          </div>
        </div>
      </div>
    </div>


    @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{!! \Session::get('success')!!}</p>
        </div>
    @endif
    
    @if (\Session::has('save'))
        <div class="alert alert-success">
          <p>{!! \Session::get('save')!!}</p>
        </div>
    @endif

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div>
              <div class="slide-one-item home-slider owl-carousel">
                <div><img src="{{ asset('assets/images/'.$singleProp->image.'')}}" alt="Image" class="img-fluid"></div>
              </div>
            </div>
            <div class="bg-white property-body border-bottom border-left border-right">
              <div class="row mb-5">
                <div class="col-md-6">

                  <strong class="text-success h1 mb-3">${{$singleProp->price}}</strong>
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">{{$singleProp->beds}}<sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">{{$singleProp->baths}}</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number">{{$singleProp->sq_ft}}</span>
                    
                  </li>
                </ul>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                  <strong class="d-block">{{$singleProp->home_type}}</strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                  <strong class="d-block">{{$singleProp->year_built}}</strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                  <strong class="d-block">${{$singleProp->price_sqft}}</strong>
                </div>
              </div>
              <h2 class="h4 text-black">More Info</h2>
<p>{{$singleProp->more_info}}</p>
              <div class="row no-gutters mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3">Gallery</h2>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="{{asset('assets/images/img_1.jpg')}}" class="image-popup gal-item"><img src="{{asset('assets/images/img_1.jpg')}}" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="{{asset('assets/images/img_2.jpg')}}" class="image-popup gal-item"><img src="{{asset('assets/images/img_2.jpg')}}" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="{{asset('assets/images/img_3.jpg')}}" class="image-popup gal-item"><img src="{{asset('assets/images/img_3.jpg')}}" alt="Image" class="img-fluid"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">

            <div class="bg-white widget border rounded">

              <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
              @if (isset(Auth::user()->id))
                @if ($validateFormCount > 0)
                <p class="alert alert-success"> You already sent a request for this proprety</p>
                @else
                <form method="POST" action="{{route('insert.request',$singleProp->id)}}" class="form-contact-agent">
                  @csrf
                  <div class="form-group">
                    <input type="hidden" name="prop_id" value="{{$singleProp->id}}"  id="name" class="form-control">
                  </div><div class="form-group">
                    <input type="hidden" name="title" value="{{$singleProp->title}}"  id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                  @error('name')
                  <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                  <div class="form-group">
                    <label for="location">location</label>
                    <input type="location" name="location" id="location" class="form-control">
                  </div>
                  @error('location')
                  <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                  <div class="form-group">
                    <label for="price">Phone</label>
                    <input type="text" name="price" id="price" class="form-control">
                  </div>
                  @error('price')
                  <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                  <div class="form-group">
                    <input type="submit" name="submit" id="price" class="btn btn-primary" value="Send Request">
                  </div>
                </form>
                @endif
              @else
              <p class="alert alert-success">Login to sent a request to the property</p>
                  
              @endif

            </div>

            
            <div class="bg-white widget border rounded">

              <h3 class="h4 text-black widget-title mb-3">Save this proprety</h3>
              @if (isset(Auth::user()->id))
                @if ($validateSavingPropretyCount > 0)
                    <input type="submit" name="submit" id="price" class="btn btn-primary" disabled value="You already save this proprety">
                @else
                <form method="POST" action="{{route('save.prop',parameters: $singleProp->id)}}" class="form-contact-agent">
                  @csrf
                  <div class="form-group">
                    <input type="hidden" name="prop_id" value="{{$singleProp->id}}" id="name" class="form-control">
                  </div><div class="form-group">
                    <input type="hidden" name="title" value="{{$singleProp->title}}" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="image" value="{{$singleProp->image}}" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="location" id="location" value="{{$singleProp->location}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="price" id="price" value="{{$singleProp->price}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" id="price" class="btn btn-primary" value="Save proprety">
                  </div>
                </form>
                @endif
              @else
                <p class="alert alert-success">Login to save property</p>
                  
              @endif

            </div>

            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
            </div>

            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                    <div class="px-3" style="margin-left: :-15px;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('single.prop',parameters: $singleProp->id)}}&quote={{$singleProp->id}}" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="https://x.com/intent/tweet?text={{$singleProp->id}}&url={{route('single.prop',$singleProp->id)}}" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="https://linkedin.com/sharing/share-offsite/?url{{route('single.prop',$singleProp->id)}}" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>
            </div>

          </div>
          
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2>Related Properties</h2>
            </div>
          </div>
        </div>
      
        <div class="row mb-5">

        @if ($relateProps->count() > 0)

        @foreach ($relateProps as $relateProp )
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="{{route('single.prop',$relateProp->id)}}" class="property-thumbnail">
                <div class="offer-type-wrap">
                  {{-- <span class="offer-type bg-danger">Sale</span> --}}
                  <span class="offer-type bg-success">{{$relateProp->type}}</span>
                </div>
                <img src="{{asset('assets/images/'.$relateProp->image.'')}}" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="{{route('single.prop',$relateProp->id)}}">{{$relateProp->title}}</a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{$relateProp->location}}</span>
                <strong class="property-price text-primary mb-3 d-block text-success">${{$relateProp->price}}</strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">{{$relateProp->beds}} <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">{{$relateProp->baths}}</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number">{{$relateProp->price_sqft}}</span>
                    
                  </li>
                </ul>

              </div>
            </div>
          </div>   
        @endforeach
        @else

        <h3 class="alert alert-success"> they are not related properties for now</h3>
            
        @endif

         
        </div>
      </div>

@endsection
