@extends('layouts.admin')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Home Type</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a href="{{route('hometypes.create')}}" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Ajouter</a>
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
                    
                    <th>Modifier</th>
                    <th>Suprimer</th>
                </thead>
                <tbody>
                    @foreach ($allHomeTypes as $Liste )
                        <tr>
                            <td>{{$Liste->id}}</td>
                            <td>{{$Liste->hometypes}}</td>
                            
                            <td><a  href = "{{route('hometypes.edit',$Liste->id)}}" class="btn btn-warning"> Modifier </a>
                            <td><a  href = "{{route('hometypes.delete',$Liste->id)}}" class="btn btn-danger">Delete </a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- {{$allHomeTypes->links()}} --}}

@endsection