@extends('layouts.master')
@section('content')
<style>
.container{
	padding:0.5%;
}

</style>
<div class="container">
	<h3 class="alert alert-success " style="color:red ; text:bold">Edit Employee #{{$emp->id}}<span class="fa fa" style="float:right"><img src="{{URL::to('/')}}/images/{{$emp->image}}" class="rounded-circle" width='40' height='40'>{{$emp->first_name}} {{$emp->last_name}} </span></h3>
	
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<form action="{{ route('employee.update',$emp->id)}}" method="post" enctype="multipart/form-data">
				@csrf  <!-- to genrate token -->
				@method('PUT')
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="first_name" id="first_name" value="{{ $emp->first_name }}">	
							@error('first_name')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="last_name" id="last_name" value = "{{ $emp->last_name}}">
							@error('last_name')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="email" id="email" value = "{{ $emp->email }}">
							@error('email')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="mobile" id="mobile" value ="{{ $emp->mobile }}">
							@error('mobile')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control" name="designation" id="designation" value = "{{ $emp->designation }}">
							@error('designation')<p style="color:red;">{{$message}}</p>@enderror	
						</div>	
						<div class="form-group col-md-6">
							<input type="text" class="form-control" name="gender" id="gender" value= "{{ $emp->gender }}">
							@error('gender')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<input type="file" class="form-control" name="image" id="image" >
								@error('image')<p style="color:red;">{{$message}}</p>@enderror	
							</div>
							<div class="form-group col-md-6">
								<img src="{{ URL::to('/')}}/images/{{$emp->image }}" class="rounded-circle" width="100" height="100">
								<input type="text" name="hidden_image" value= "{{$emp->image}}">
							</div>
						</div>
					</div>	
						<a href="#" class="btn btn-warning">Cancel</a>
						<button type="submit" name="add" class="btn btn-info input-lg">Update</button>
				</form>
			</form>	
		</div>
	</div>
</div>
@endsection