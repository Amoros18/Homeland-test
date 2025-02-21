@extends('layouts.admin')


@section('content')

<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Create Admin</h3>
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

                

                <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="email" name="email" class="form-control " value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Mot de passe:</label>
                    <input type="password" name="password" class="form-control ">
                    @error('password')
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
