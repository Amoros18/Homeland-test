@extends('layouts.admin')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Properties</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a href="" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Create Gallery</a>
            <a href="" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Create Properties</a>
        </div>
    </div>
</div>

<div  class="box-body">
    <div class="">
        <div class="table-responsive">
            <table class="table table-hover table-responsible table-striped">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Home type</th>
                    <th>type</th>
                    <th>city</th>                    
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($allProps as $Liste )
                        <tr>
                            <td>{{$Liste->id}}</td>
                            <td>{{$Liste->title}}</td>
                            <td>{{$Liste->price}}</td>
                            <td>{{$Liste->home_type}}</td>
                            <td>{{$Liste->type}}</td>
                            <td>{{$Liste->city}}</td>
                            
                            <td><a  href = "{{route('props.delete',$Liste->id)}}" class="btn btn-danger">Delete </a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- {{$allHomeTypes->links()}} --}}

@endsection