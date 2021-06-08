@extends('layouts.master')
@section('content')
<style>
.container{
	padding:0.5%;
}
.empbtn{
    font-weight: bolder;
    height: 30px;
    margin-right: 4px;
    padding-top: 7px;
    border-radius: 0;
}

</style>
<div class="container">
	<h2 class="alert alert-dark text-center" style="color:red ; text:bold"><span class="fab fa-laravel">Larvel 6.0 Crud Application</span></h2>
	@if($message=Session::get('Success'))
		<div class="alert alert-success">
			<p align="center">{{$message}}</p>
		</div>
	@endif

	@if($message=Session::get('error'))
		<div class="alert alert-danger">
			<p align="center">{{$message}}</p>
		</div>
	@endif
</div>
<div align="right">
	<a href="{{route('employee.create')}}" class="btn btn-info"> <span class="fas fa-plus-circle empbtn"> Add New Employee </span></a>
</div>
<table class="table table-bordered table-striped bg-dark" style="color:white;border:none">
	<tr class="text-center">
		<th width="5%">Image</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Gender</th>
		<th>Designation</th>
		<th>Action</th>
	</tr> 
	<!-- add foreach loop here -->
	@foreach($employee as $emp)
		<tbody style="color:black;font:bold;background:#ffff">
			<tr class="text-center">
			
				<td><img src="{{ URL::to('/') }}/images/{{$emp->image}}" class="rounded-circle" width="60"></td>
	            <td>{{$emp->first_name}}</td>
	            <td>{{$emp->last_name}}</td>
	            <td>{{$emp->email}}</td>
	            <td>{{$emp->mobile}}</td>
	            <td>{{$emp->gender}}</td>
	            <td>{{$emp->designation}}</td>
	           
	            <td>
	            	<form action="{{route('employee.destroy',$emp->id) }}" method="POST">
	            		<a href="{{route('employee.show', $emp->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span>Show</a>
	            		<a href="{{route('employee.edit', $emp->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span>Edit</a>
	            		@csrf
	            		@method('DELETE')
	            		<button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span>Delete</button>
	            	</form>
	            </td>
	        
	        <!-- we end here foreach loop -->
			<tr>
		</tbody>
	@endforeach
</table>

{{$employee->links()}}

@endsection