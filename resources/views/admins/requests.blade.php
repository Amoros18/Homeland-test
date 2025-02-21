@extends('layouts.admin')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Liste des Admins</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a href="{{route('admin.create')}}" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Ajouter</a>
        </div>
    </div>
</div>

<div  class="box-body">
    <div class="">
        <div class="table-responsive">
            <table class="table table-hover table-responsible table-striped">
                <thead>
                    <th>#</th>
                    <th>Admin Name</th>
                    <th>Email</th>
                    <th>Phone </th>
                    <th>Agent name </th>
                    
                    <th>Go to this property</th>
                </thead>
                <tbody>
                    @foreach ($allRequests as $Liste )
                        <tr>
                            <td scope="row">{{$Liste->id}}</td>
                            <td>{{$Liste->name}}</td>
                            <td>{{$Liste->email}}</td>
                            <td>{{$Liste->phone}}</td>
                            <td>{{$Liste->agent_name}}</td>
                            <td><a  href = "{{route('single.prop',$Liste->prop_id)}}" class="btn btn-success text-center">go to this property</a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- {{$allAdmins->links()}} --}}

@endsection