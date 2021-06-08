@extends('layouts.master')
@section('content')
<style>
.container{
	padding:0.5%;
}

</style>
<div class="container">
	<h2 class="alert alert-success text-center" style="color:red ; text:bold">Welcome!! Create Your New Employee Here </h2>
	
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<form action="{{ route('employee.store')}}" method="POST" enctype="multipart/form-data">
				@csrf  <!-- to genrate token -->
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="first_name" id="first_name" placeholder="Enter First Name">	
							@error('first_name')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="last_name" id="last_name" placeholder="Enter Last Name">
							@error('last_name')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="email" id="email" placeholder="Enter Your Email">
							@error('email')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control"name="mobile" id="mobile" placeholder="Enter Mobile Number">
							@error('mobile')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="form-group col-md-6">
							<input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Your Designation">
							@error('designation')<p style="color:red;">{{$message}}</p>@enderror	
						</div>	
						<div class="form-group col-md-6">
							<input type="text" class="form-control" name="gender" id="gender" placeholder="Enter Your Gender">
							@error('gender')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
						<div class="form-group col-md-6">
							<input type="file" class="form-control" name="image" id="image" >
							@error('image')<p style="color:red;">{{$message}}</p>@enderror	
						</div>
					</div>	
						<a href="#" class="btn btn-warning">Cancel</a>
						<button type="submit" name="add" class="btn btn-info input-lg">Submit</button>		
					</div>
				</form>
			</form>	
		</div>
	</div>
</div>
@endsection