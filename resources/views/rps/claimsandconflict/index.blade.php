@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Claims and Conflict</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">


        				@if (count($errors) > 0)
								<div class="alert alert-danger">
							    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
							    <ul>
    							  @foreach ($errors->all() as $error)
          							<li>{{ $error }}</li>
							      @endforeach
							    </ul>
								</div>
						@endif

						@if(session('success'))
						<div class="alert alert-success">
  							{{ session('success') }}
						</div> 
						@endif


        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Entry</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Parties</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Subject(Boundary/ies)</th>
                    <th>Area</th>
                    <th>Lot And Survey No.</th>
                    <th>Mode of Desposition</th>
                    <th>Person in Charge</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cnc as $cncs)
                  	<tr>
                  		<td>{{ $cncs->id }}</td>
                  		<td>{{ $cncs->parties }}</td>
                  		<td>{{ $cncs->status }}</td>
                  		<td>{{ $cncs->location }}</td>
                  		<td>{{ $cncs->subject }}</td>
                  		<td>{{ $cncs->area }}</td>
                  		<td>{{ $cncs->lotsurveynum }}</td>
                  		<td>{{ $cncs->modedesposition }}</td>
                  		<td>{{ $cncs->personincharge }}</td>
                  		<td><a href="#view{{ $cncs->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $cncs->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $cncs->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a><a href="#upload{{ $cncs->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
                  				@else

                  				@endif
                  			@else
                  			<a href="#edit{{ $cncs->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			<a href="#upload{{ $cncs->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\ClaimsAndConflictController@store', 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Parties') !!}
				    				{!! Form::text('parties',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Subject(Bourdary/ies') !!}
				    				{!! Form::text('subject',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','CSW Report file') !!}
				    				{!! Form::file('docs_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area(hectares)') !!}
				    				{!! Form::text('area',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','lotsurveynum') !!}
				    				{!! Form::text('lotsurveynum',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Mode of Desposition') !!}
				    				{!! Form::text('modedesposition',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Person Incharge') !!}
				    				{!! Form::text('personincharge',null,['class'=>'form-control']) !!}
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
@foreach($cnc as $cncs)
<div id="edit{{ $cncs->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\ClaimsAndConflictController@update', $cncs->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Parties') !!}
				    				{!! Form::text('parties',$cncs->parties,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$cncs->status,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$cncs->location,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Subject(Bourdary/ies') !!}
				    				{!! Form::text('subject',$cncs->subject,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','CSW Report file') !!}
				    				{!! Form::file('docs_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area(hectares)') !!}
				    				{!! Form::text('area',$cncs->area,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','lotsurveynum') !!}
				    				{!! Form::text('lotsurveynum',$cncs->lotsurveynum,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Mode of Desposition') !!}
				    				{!! Form::text('modedesposition',$cncs->modedesposition,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Person Incharge') !!}
				    				{!! Form::text('personincharge',$cncs->personincharge,['class'=>'form-control']) !!}
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


@foreach($cnc as $cncs)
<div id="view{{ $cncs->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\ClaimsAndConflictController@update', $cncs->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">View Details</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Parties') !!}
				    				{!! Form::text('parties',$cncs->parties,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$cncs->status,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$cncs->location,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Subject(Bourdary/ies') !!}
				    				{!! Form::text('subject',$cncs->subject,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','CSW Report file') !!}
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$cncs->cswreport_filepath) ?>"><img src="<?php echo asset('/public/storage/'.$cncs->cswreport_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area(hectares)') !!}
				    				{!! Form::text('area',$cncs->area,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','lotsurveynum') !!}
				    				{!! Form::text('lotsurveynum',$cncs->lotsurveynum,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Mode of Desposition') !!}
				    				{!! Form::text('modedesposition',$cncs->modedesposition,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Person Incharge') !!}
				    				{!! Form::text('personincharge',$cncs->personincharge,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office') !!}
				    				{{ App\Models\Offices::find($cncs->office_id)->officename }}
				    				
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By') !!}
				    				{{ Auth::user($cncs->encoded_by)->name }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    	</div>    
				</div>
				    
		    {!! Form::close() !!}
 					

 			</div>

 		</div>

 	</div>
</div>
@endforeach


<!--
					<div class="container">
        				<div class="row justify-content-center">
            				<div class="col-md-8">
                				<div class="card">
                    				<div class="card-header">Photo Uploader</div>
                    					<div class="card-body">
		                        			
                    					</div>
                					</div>
            					</div>
        					</div>
    					</div>
					</div>
-->
@endsection