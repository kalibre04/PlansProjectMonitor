@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Wildlife Transport Permit</h3>
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
                    <th>Applicant Name</th>
                    <th>Location</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th>Number of Wildlife</th>
                    <th>Species</th>
                    <th>Date Issued</th>
                    <th>Certification Fee</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($wtp as $wtps)
                  	<tr>
                  		<td>{{ $wtps->id }}</td>
                  		<td>{{ $wtps->applicant_name }}</td>
                  		<td>{{ $wtps->location }}</td>
                  		<td>{{ $wtps->destination }}</td>
                  		<td>{{ $wtps->status }}</td>
                  		<td>{{ $wtps->numberofwildlife }}</td>
                  		<td>{{ $wtps->species }}</td>
                  		<td>{{ $wtps->dateissued }}</td>
                  		<td>{{ $wtps->certification_fee }}</td>
                  		<td><a href="#view{{ $wtps->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $wtps->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $wtps->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a><a href="#upload{{ $wtps->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
                  				@else

                  				@endif
                  			@else
                  			<a href="#edit{{ $wtps->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			<a href="#upload{{ $wtps->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\WildlifeTransportPermitController@store', 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Proof of Acquisition(scanned file)') !!}
				    				{!! Form::file('proofofacquisition',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Destination') !!}
				    				{!! Form::text('destination',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{{ Form::select('status', array('Approved'=>'Approved', 'Pending'=>'Pending'), 'Approved', ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Map file(image)') !!}
				    				{!! Form::file('map_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Approved Documents file') !!}
				    				{!! Form::file('docs_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Number of Wildlife') !!}
				    				{!! Form::text('numberofwildlife',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Inspection Report') !!}
				    				{!! Form::file('inspection_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Permit No.') !!}
				    				{!! Form::text('permitnumber',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Issued') !!}
				    				{!! Form::date('dateissued',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Certification Fee') !!}
				    				{!! Form::text('certification_fee',null,['class'=>'form-control']) !!}
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
@foreach($wtp as $wtps)
<div id="edit{{ $wtps->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\WildlifeTransportPermitController@update', $wtps->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$wtps->applicant_name,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Proof of Acquisition(image)') !!}
				    				{!! Form::file('proofofacquisition',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$wtps->location,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Destination') !!}
				    				{!! Form::text('destination',$wtps->destination,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{{ Form::select('status', array('Approved'=>'Approved', 'Pending'=>'Pending', 'Cancelled'=>'Cancelled'), $wtps->status, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Map file(image)') !!}
				    				{!! Form::file('map_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Approved Documents file') !!}
				    				{!! Form::file('docs_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Number of Wildlife') !!}
				    				{!! Form::text('numberofwildlife',$wtps->numberofwildlife,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Species') !!}
				    				{!! Form::text('species',$wtps->species,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Inspection Report') !!}
				    				{!! Form::file('inspection_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Permit No.') !!}
				    				{!! Form::text('permitnumber',$wtps->permitnumber,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Issued') !!}
				    				{!! Form::date('dateissued',$wtps->dateissued,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Certification Fee') !!}
				    				{!! Form::text('certification_fee',$wtps->certification_fee,['class'=>'form-control']) !!}
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


@foreach($wtp as $wtps)
<div id="view{{ $wtps->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\WildlifeTransportPermitController@update', $wtps->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">View Details</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$wtps->applicant_name,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Proof of Acquisition') !!}
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$wtps->proofacquisition_filepath) ?>"><img src="<?php echo asset('/public/storage/'.$wtps->proofacquisition_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$wtps->location,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Destination') !!}
				    				{!! Form::text('destination',$wtps->destination,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$wtps->status,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Map file(image)') !!}
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$wtps->map_filepath) ?>"><img src="<?php echo asset('/public/storage/'.$wtps->map_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Approved Documents file') !!}
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$wtps->approveddocs_filepath) ?>"><img src="<?php echo asset('/public/storage/'.$wtps->approveddocs_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Number of Wildlife') !!}
				    				{!! Form::text('numberofwildlife',$wtps->numberofwildlife,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Species') !!}
				    				{!! Form::text('species',$wtps->species,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Inspection Report') !!}
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$wtps->inspectionreport_filepath) ?>"><img src="<?php echo asset('/public/storage/'.$wtps->inspectionreport_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Permit No.') !!}
				    				{!! Form::text('permitnumber',$wtps->permitnumber,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Issued') !!}
				    				{!! Form::date('dateissued',$wtps->dateissued,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Certification Fee') !!}
				    				{!! Form::text('certification_fee',$wtps->certification_fee,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office:') !!}
				    				{{ App\Models\Offices::find($wtps->office_id)->officename }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By:') !!}
				    				{{ Form::text('encoded_by', Auth::user($wtps->encoded_by)->name, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Geotag Photos') !!}	
				    				@foreach(App\Models\WildlifeTransportPermit_geotag::where('f_id', $wtps->id)->get() as $gphoto)
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$gphoto->filepath) ?>"><img src="<?php echo asset('/public/storage/'.$gphoto->filepath) ?>" alt="picture"></a>
				    				@endforeach
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

@foreach($wtp as $wtps)
<div id="upload{{ $wtps->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				
					<div class="modal-header">
			    		<h4 class="modal-title"></h4>
			    	</div>

				<div class="modal-body">
			    	{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\WildlifeTransportPermitController@upload_photo', $wtps->id], 'files'=>true]) !!}
                            		<div class="form-group">
                                		<label for="title">Image</label>
                                		<input type="file" name="photos[]" class="form-control-file" multiple="">
                                		@if($errors->has('files'))
                                    		<span class="help-block text-danger">{{ $errors->first('files') }}</span>
                                		@endif
                                		{{ Form::text('rec_id', $wtps->id, ['class'=>'form-control', 'hidden']) }}
                            		</div>
                            		<div class="text-center">
                                		<button class="btn btn-primary">Upload</button>
                            		</div>
                    {!! Form::close() !!}				    	
					<div class="modal-footer">
				    	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
		    		{!! Form::close() !!}
 				</div>
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