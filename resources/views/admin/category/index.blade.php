@extends('admin.layouts.main')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Tables</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">Category Tables</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Category Tables</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>SN</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @if(count($categories)>0)
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td><a href="#">{{$key+1}}</a></td>
                                        <td><img src="{{Storage::url($category->image)}}" width="100" alt="produit"></td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td><a href="{{route('category.edit', [$category->id])}}"><button class="btn btn-primary">Edit</button></a></td>
                                        <td>
                                            <form action="{{route('category.destroy',[$category->id])}}" method="POST" onsubmit="return confirmDelete()">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td>No category created yet</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>

@endsection
