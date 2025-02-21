@extends('layouts.admin')


@section('content')

<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Create HomeType</h3>
</div>
<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="name" class="control-label">Nom:</label>
                    <input type="text" name="name" class="form-control " value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
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
