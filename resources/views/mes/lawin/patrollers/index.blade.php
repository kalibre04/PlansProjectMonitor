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
                  		<td>{{ $patroller->fullname }}</td>
                  		<td>{{ $patroller->position }}</td>
                  		<td>{{ $patroller->office_id }}</td>
                  		<td>{{ App\Models\Offices::find($patroller->office_id)->officename }}</td>
                  		<td><a href="#view{{ $apprehend->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>
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
 				{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\ApprehensionController@store']) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office') !!}
				    				{!! Form::select('office_id',$offices,null,['class'=>'search-office', 'style'=>'width: 100%']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Apprehended') !!}
				    				{!! Form::date('date_apprehended', \Carbon\Carbon::now(), ['class'=>'']); !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Apprehending Officer') !!}
				    				{!! Form::text('appre_officer',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Respondent') !!}
				    				{!! Form::text('respondent',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Conveyance') !!}
				    				{!! Form::text('conveyance',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Cutting Implements') !!}
				    				{!! Form::text('cutting_imple',null, ['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Species') !!}
				    				{!! Form::text('species',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Volume') !!}
				    				{!! Form::text('volume',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Estimated Value') !!}
				    				{!! Form::text('estimatedvalue',null,['class'=>'form-control']) !!}
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
@foreach($apprehension as $apprehend)
<div id="edit{{ $apprehend->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\ApprehensionController@update', $apprehend->id]]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office') !!}
				    				{!! Form::select('office_id',$offices,$apprehend->office_id,['class'=>'search-office', 'style'=>'width: 100%']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Apprehended') !!}
				    				{!! Form::date('date_apprehended', $apprehend->date_apprehended); !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Apprehending Officer') !!}
				    				{!! Form::text('appre_officer', $apprehend->appre_officer, ['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$apprehend->location,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Respondent') !!}
				    				{!! Form::text('respondent',$apprehend->respondent,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Conveyance') !!}
				    				{!! Form::text('conveyance',$apprehend->conveyance,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Cutting Implements') !!}
				    				{!! Form::text('cutting_imple',$apprehend->cutting_imple, ['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Species') !!}
				    				{!! Form::text('species',$apprehend->species,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Volume') !!}
				    				{!! Form::text('volume',$apprehend->volume,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Estimated Value') !!}
				    				{!! Form::text('estimatedvalue',$apprehend->estimatedvalue,['class'=>'form-control']) !!}
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


@foreach($apprehension as $apprehend)
<div id="view{{ $apprehend->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
				    				<label>Office</label>
				    				<input name='office_id' value='{{ App\Models\Offices::find($apprehend->office_id)->officename }}' readonly="true"></input>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Apprehended') !!}
				    				{!! Form::date('date_apprehended', $apprehend->date_apprehended, ['readonly']); !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Apprehending Officer') !!}
				    				{!! Form::text('appre_officer', $apprehend->appre_officer, ['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::textarea('location',$apprehend->location,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Respondent') !!}
				    				{!! Form::textarea('respondent',$apprehend->respondent,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Conveyance') !!}
				    				{!! Form::textarea('conveyance',$apprehend->conveyance,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Cutting Implements') !!}
				    				{!! Form::text('cutting_imple',$apprehend->cutting_imple, ['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Species') !!}
				    				{!! Form::text('species',$apprehend->species,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Volume') !!}
				    				{!! Form::text('volume',$apprehend->volume,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Estimated Value') !!}
				    				{!! Form::text('estimatedvalue',$apprehend->estimatedvalue,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By') !!}
				    				{{ Form::text('encoded_by', Auth::user($apprehend->encoded_by)->name, ['class'=>'form-control', 'readonly']) }}
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