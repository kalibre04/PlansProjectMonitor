@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Create Team</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Entry</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Sector</th>
                    <th>Office</th>
                    <th>Quarter</th>
                    <th>Year</th>                  
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($patrolteams as $patrolteam)
                  	<tr>
                  		<td>{{ $patrolteam->id }}</td>
                  		<td>{{ $patrolteam->team_sector }}</td>
                  		<td>{{ App\Models\Offices::find($patrolteam->office_id)->officename }}</td>
                  		<td>{{ $patrolteam->quarter }}</td>
                  		<td>{{ $patrolteam->year }}</td>
                  		<td><a href="#view{{ $patrolteam->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>
                  			@if(Auth::user()->id != $patrolteam->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $patrolteam->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  				@else

                  				@endif
                  			@else
                  			<a href="#edit{{ $patrolteam->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
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
 				{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PatrolTeamsController@store', 'files'=>true]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Create Team</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Sector') !!}
				    				{!! Form::text('team_sector',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{{ Form::text('team_office', Auth::user()->office_id, ['class'=>'form-control', 'hidden']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Quarter') !!}
				    				{!! Form::text('quarter',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Year') !!}
				    				{!! Form::text('year',null,['class'=>'form-control']) !!}
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
@foreach($patrolteams as $patrolteam)
<div id="edit{{ $patroller->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\PatrolTeamsController@update', $patrolteam->id], 'files'=>true]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Edit Team</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Sector') !!}
				    				{!! Form::text('team_sector',$patrolteam->team_sector,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{{ Form::text('team_office', Auth::user()->office_id, ['class'=>'form-control', 'hidden']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Quarter') !!}
				    				{!! Form::text('quarter',$patrolteam->quarter,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','year') !!}
				    				{!! Form::text('year',$patrolteam->year,['class'=>'form-control']) !!}
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


@endsection