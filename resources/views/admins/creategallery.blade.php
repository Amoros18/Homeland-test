@extends('layouts.admin')


@section('content')

<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Create Gallery</h3>
</div>
<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="{{route('gallery.store')}}" enctype="multipart/form-data" method="POST" class="vstack gap 3 text-black">
                @csrf
    
                <div class="form-group">
                    <label for="formFileMultible" class="control-label">Property Image:</label>
                    <input type="file" name="image[]" class="form-control " id="formFileMultible" multiple>
                    @error('location')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
    
                <select name="prop_id" id="home_type" class="form-control form-select">
                    <option selected>Select Property</option>
                    @foreach ($allProps as $prop )
                    <option value="{{$prop->id}}">{{$prop->title}}</option>
                    @endforeach
                </select>
                
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
