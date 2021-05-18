@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">List of LAWIN Patrollers</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Entry</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Fullname</th>
                    <th>Position</th>
                    <th>Office</th>                  
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($patrollers as $patroller)
                  	<tr>
                  		<td>{{ $patroller->id }}</td>
                  		<td><a target="_blank" href="<?php echo asset('/public/storage/'.$patroller->filepath) ?>"><img src="<?php echo asset('/public/storage/'.$patroller->filepath) ?>" alt="picture"></a></td>
                  		<td>{{ $patroller->fullname }}</td>
                  		<td>{{ $patroller->position }}</td>
                  		<td>{{ App\Models\Offices::find($patroller->office_id)->officename }}</td>
                  		<td><a href="#view{{ $patroller->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>
                  			@if(Auth::user()->id != $patroller->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $patroller->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  				@else

                  				@endif
                  			@else
                  			<a href="#edit{{ $patroller->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			@endif
                  		</td>
                  	</tr>
                  @endforeach
                  </tbody>                  
                </table>
        </div>
              <!-- /.card-body -->
</div>


<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\LawinPatrollersController@store', 'files'=>true]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Add Patroller</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Fullname') !!}
				    				{!! Form::text('fullname',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Position') !!}
				    				{!! Form::text('position',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Photo') !!}
				    				{!! Form::file('photo',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{{ Form::text('office_id', Auth::user()->office_id, ['class'=>'form-control', 'hidden']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{{ Form::text('encoded_by', Auth::user()->id, ['class'=>'form-control', 'hidden']) }}
				    			</div>
				    		</div>
				    	</div>
				</div>
				    <div class="modal-footer">
				    	{!! Form::submit('Save Entry',['class'=>'btn btn-primary']) !!}
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>

		    {!! Form::close() !!}
 			</div>
 		</div>
 	</div>
</div>

@endsection

@section('modal')
@foreach($patrollers as $patroller)
<div id="edit{{ $patroller->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\LawinPatrollersController@update', $patroller->id], 'files'=>true]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Edit Patroller</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Fullname') !!}
				    				{!! Form::text('fullname',$patroller->fullname,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Position') !!}
				    				{!! Form::text('position',$patroller->position,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Photo') !!}
				    				{!! Form::file('photo',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{{ Form::text('office_id', Auth::user()->office_id, ['class'=>'form-control', 'hidden']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{{ Form::text('encoded_by', Auth::user()->id, ['class'=>'form-control', 'hidden']) }}
				    			</div>
				    		</div>
				    	</div>
				</div>
				    <div class="modal-footer">
				    	{!! Form::submit('Save Entry',['class'=>'btn btn-primary']) !!}
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>

		    {!! Form::close() !!}
 					

 			</div>

 		</div>
 	</div>
</div>
@endforeach


@foreach($patrollers as $patroller)
<div id="view{{ $patroller->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				
			    <div class="modal-header">
			    	<h4 class="modal-title">View Record</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Fullname') !!}
				    				{!! Form::text('fullname',$patroller->fullname,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Position') !!}
				    				{!! Form::text('position',$patroller->position,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				<label>Office</label>
				    				<input name='office_id' value='{{ App\Models\Offices::find($patroller->office_id)->officename }}' readonly="true"></input>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By') !!}
				    				{{ Form::text('encoded_by', Auth::user($patroller->encoded_by)->name, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				</div>
				    <div class="modal-footer">
				    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>

		    {!! Form::close() !!}
 					

 			</div>

 		</div>

    	

 	</div>
</div>
@endforeach



@endsection