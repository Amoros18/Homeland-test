@extends('layouts.admin')


@section('content')

<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Create Property</h3>
</div>
<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="{{route('props.store')}}" enctype="multipart/form-data" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="name" class="control-label">Title:</label>
                    <input type="text" name="title" class="form-control " value="{{old('title')}}">
                    @error('title')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                

                <div class="form-group">
                    <label for="email" class="control-label">price:</label>
                    <input type="texte" name="price" class="form-control " value="{{old('price')}}">
                    @error('price')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Property image:</label>
                    <input type="file" name="image" class="form-control ">
                    @error('password')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">beds:</label>
                    <input type="text" name="beds" class="form-control ">
                    @error('beds')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </divbeds

                <div class="form-group">
                    <label for="password" class="control-label">baths:</label>
                    <input type="text" name="baths" class="form-control ">
                    @error('baths')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">sq_ft:</label>
                    <input type="text" name="sq_ft" class="form-control ">
                    @error('sq_ft')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">year_built:</label>
                    <input type="texsq_ft" name="year_built" class="form-control ">
                    @error('year_built')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">price_sqft:</label>
                    <input type="text" name="price_sqft" class="form-control ">
                    @error('price_sqft')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">location:</label>
                    <input type="text" name="location" class="form-control ">
                    @error('location')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <select name="home_type" id="home_type" class="form-control form-select">
                    <option selected>Select Home type</option>
                    <option value="Condo">Condo</option>
                    <option value="Commercial">Commercial</option>
                </select>
                <select name="type" id="home_type" class="form-control form-select">
                    <option selected>Select type</option>
                    <option value="Rent">Rent</option>
                    <option value="Buy">Buy</option>
                </select>
                <select name="city" id="home_type" class="form-control form-select">
                    <option selected>Select City</option>
                    <option value="New York">New York</option>
                    <option value="London">London</option>
                </select>

                <div class="form-group">
                    <label for="password" class="control-label">more_info:</label>
                    <textarea type="text" name="more_info" class="form-control "></textarea>
                    @error('more_info')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="agent_name" class="form-control ">
                    @error('agent_name')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <center class="mt-1">
                    <button class="btn btn-new me-2" type="submit" >
                            Enregistrer
                    </button >
                    <input type="reset" class="btn btn-new" value="Effacer">
                </center>
                
            </form>
        </div>
    </div>
</div>
@endsection
