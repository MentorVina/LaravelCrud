@extends('layouts.master')
@section('content')
<style>
.container{
	padding:0.5%;

}


</style>
<div class="container">
	<h2 class="alert alert-dark text-center" style="color:red ; text:bold"><span class="fab fa-laravel">Larvel 6.0 Crud Application</span></h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<form class="form-horizontal">
				<feildset>
					<legend>
			   			Employee Profile<span class="fa fa">: {{ $data->first_name }} {{ $data->last_name }} </span>
			   		</legend>
			   	</feildset>
			   	<div class="jumbotron text-center">
			   		<div align="center">
			   			<img src="{{URL::to('/')}}/images/{{$data->image}}" class="rounded-circle" width='100' height='100'>
			   		</div>
			   		<div align="center">
			   			<table>
			   				<tr>
			   					<td><span style="font-weight: bold;">First Name:</span></td>
			   					<td><span>{{$data->first_name}}</span></td>
			   				</tr>
			   				<tr>
			   					<td><span style="font-weight: bold;">Last Name:</span></td>
			   					<td><span>{{$data->last_name}}</span></td>
			   				</tr>
			   				<tr>
			   					<td><span style="font-weight: bold;">Email:</span></td>
			   					<td><span>{{$data->email}}</span></td>
			   				</tr>
			   			    <tr>
			   			    	<td><span style="font-weight: bold;">Mobile:</span></td>
			   			    	<td><span>{{$data->mobile}}</span></td>
			   			    </tr>
			   			    <tr>
			   			    	<td><span style="font-weight: bold;">Gender:</span></td>
			   			    	<td><span>{{$data->gender}}</span></td>
			   			    </tr>
			   			    <tr>
			   			    	<td><span style="font-weight: bold;">Designation:</span></td>
			   			    	<td><span>{{$data->designation}}</span></td>
			   			    </tr>
			   			</table>
			   		</div> 
			   	</div>
			</form>
		</div>

	</div>
</div>

@endsection