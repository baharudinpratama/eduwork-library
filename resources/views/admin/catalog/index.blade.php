@extends('layouts.admin')

@section('header', 'Catalog')

@section('content')
	<div class="row">
    	<div class="col-md-6">
           	<div class="card">
              	<div class="card-header">
                	<!-- h3 class="card-title">Data Catalog</h3-->
                	<a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>

	                <div class="card-tools">
	                  	<div class="input-group input-group-sm" style="width: 150px;">
	                    	<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

	                    	<div class="input-group-append">
	                      		<button type="submit" class="btn btn-default">
	                        		<i class="fas fa-search"></i>
	                      		</button>
	                    	</div>
	                  	</div>
	                </div>
              	</div>
              	<!-- /.card-header -->
              	<div class="card-body table-responsive p-0">
	                <table class="table table-hover text-nowrap">
		                <thead>
		                    <tr>
		                    	<th width="5%">#</th>
		                    	<th class="text-center">Name</th>
		                    	<th class="text-center">Total Books</th>
		                    	<th class="text-center">Created At</th>
		                    	<th class="text-center">Action</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($catalogs as $key => $catalog)
		                	<tr>
		                		<td>{{ $key + 1}}</td>
		                		<td>{{ $catalog->name }}</td>
		                		<td class="text-center">{{ count($catalog->books)}}</td>
		                		<td class="text-center">{{ dateFormat($catalog->created_at) }}</td>
		                		<td class="text-center">
		                			<a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
		                			<form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
		                				<input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
		                				@method('delete')
		                				@csrf
		                			</form>
		                		</td>
		                	</tr>
		                	@endforeach
		                </tbody>
	                </table>
              	</div>
          	<!-- /.card-body -->
            </div>
        <!-- /.card -->
      	</div>
    </div>
@endsection