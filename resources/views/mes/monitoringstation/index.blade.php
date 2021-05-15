@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Monitoring Station</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Entry</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Office</th>
                    <th>Location</th>
                    <th>Personnel Assigned</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($monstation as $monstations)
                  	<tr>
                  		<td>{{ $monstations->id }}</td>
                  		<td>{{ App\Models\Offices::find($monstations->office_id)->officename }}</td>
                  		<td>{{ $monstations->location }}</td>
                  		<td>{{ $monstations->personnelassigned }}</td>
                  		<td><a target="_blank" href="<?php echo asset('/public/storage/'.$monstations->file_path) ?>"><img src="<?php echo asset('/public/storage/'.$monstations->file_path) ?>" alt="picture"></a></td>
                  		<td><a href="#view{{ $monstations->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $monstations->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $monstations->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  				@else

                  				@endif
                  			@else
                  			<a href="#edit{{ $monstations->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			@endif

                  		</td>
                  	</tr>
                  @endforeach
                  </tbody>
                </table>
        </div>
              <!-- /.card-body -->
</div>


<div id="create" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\MonitoringStationController@store', 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Add Monitoring Station</h4>
			    </div>
			    <div class="modal-body">
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
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Personnel Assigned') !!}
				    				{!! Form::text('personnelassigned',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Encoded By') !!}
				    				{{ Form::text('encoded_by', Auth::user()->id, ['class'=>'form-control', 'readonly']) }}
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
@foreach($monstation as $monstations)
<div id="edit{{ $monstations->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\MonitoringStationController@update', $monstations->id] , 'files'=>'true']) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Edit</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				<label>Office</label>
				    				<input name='office_id' value='{{ App\Models\Offices::find($monstations->office_id)->officename }}' readonly="true"></input>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location', $monstations->location, ['class'=>'form-control', 'readonly']); !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Personnel Assigned') !!}
				    				{!! Form::text('personnelassigned',$monstations->personnelassigned,['class'=>'form-control', 'readonly']) !!}
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
				    				{!! Form::label('','Encoded By') !!}
				    				{{ Form::text('encoded_by', Auth::user()->id, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				</div>
				    <div class="modal-footer">
				    	{!! Form::submit('Save Entry',['class'=>'btn btn-primary']) !!}
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
 					<!--dri icut -->
			    
		    {!! Form::close() !!}
 					

 			</div>

 		</div>

    	

 	</div>
</div>
@endforeach


@foreach($monstation as $monstations)
<div id="view{{ $monstations->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\MonitoringStationController@update', $monstations->id]]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office') !!}
				    				{!! Form::select('office_id',$offices,$monstations->office_id,['class'=>'search-office', 'style'=>'width: 100%']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location', $monstations->location, ['class'=>'form-control']); !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Personnel Assigned') !!}
				    				{!! Form::text('personnelassigned',$monstations->personnelassigned,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$monstations->file_path) ?>"><img src="<?php echo asset('/public/storage/'.$monstations->file_path) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By') !!}
				    				{{ Form::text('encoded_by', Auth::user()->id, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				</div>
				    <div class="modal-footer">
				    	
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
 					<!--dri icut -->
			    
		    	{!! Form::close() !!}
 					

 			</div>

 		</div>

 	</div>
</div>
@endforeach



@endsection