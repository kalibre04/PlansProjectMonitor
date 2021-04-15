@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Cutting Permit</h3>
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
                    <th>Area</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Permit type</th>
                    <th>Permit number</th>
                    <th>Date Awarded</th>
                    <th>Date Approved</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cutperm as $cutperms)
                  	<tr>
                  		<td>{{ $cutperms->id }}</td>
                  		<td>{{ $cutperms->applicant_name }}</td>
                  		<td>{{ $cutperms->area }}</td>
                  		<td>{{ $cutperms->location }}</td>
                  		<td>{{ $cutperms->status }}</td>
                  		<td>{{ App\Models\permit_type::find($cutperms->permit_type)->permittype }}</td>
                  		<td>{{ $cutperms->cutting_permitnum }}</td>
                  		<td>{{ $cutperms->date_award }}</td>
                  		<td>{{ $cutperms->date_approved }}</td>
                  		<td><a href="#view{{ $cutperms->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $cutperms->encoded_by)

                  			@else
                  			<a href="#edit{{ $cutperms->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			<a href="#upload{{ $cutperms->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\CuttingPermitController@store', 'files'=>true]) !!}
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
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Permit Type') !!}
				    				{!! Form::select('permit_type',$permittype,null,['class'=>'search-office', 'style'=>'width: 100%']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Awarded') !!}
				    				{!! Form::date('date_award',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Volume') !!}
				    				{!! Form::text('volume',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Cutting Permit No.') !!}
				    				{!! Form::text('cutting_permitnum',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Approved') !!}
				    				{!! Form::date('date_approved',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
@foreach($cutperm as $cutperms)
<div id="edit{{ $cutperms->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\CuttingPermitController@update', $cutperms->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$cutperms->applicant_name,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$cutperms->area,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$cutperms->location,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$cutperms->status,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Permit Type') !!}
				    				{!! Form::select('permit_type',$permittype,$cutperms->permit_type,['class'=>'search-office', 'style'=>'width: 100%']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Awarded') !!}
				    				{!! Form::date('date_award',$cutperms->date_award,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Volume') !!}
				    				{!! Form::text('volume',$cutperms->volume,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Species') !!}
				    				{!! Form::text('species',$cutperms->species,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Cutting Permit No.') !!}
				    				{!! Form::text('cutting_permitnum',$cutperms->cutting_permitnum,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Approved') !!}
				    				{!! Form::date('date_approved',$cutperms->date_approved,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Certification Fee') !!}
				    				{!! Form::text('certification_fee',$cutperms->certification_fee,['class'=>'form-control']) !!}
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


@foreach($cutperm as $cutperms)
<div id="view{{ $cutperms->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\CuttingPermitController@show', $cutperms->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">View</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$cutperms->applicant_name,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$cutperms->area,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$cutperms->location,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$cutperms->status,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Permit Type') !!}
				    				{{ App\Models\permit_type::find($cutperms->permit_type)->permittype }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Awarded') !!}
				    				{!! Form::date('date_award',$cutperms->date_award,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Map file(image)') !!}
				    				<a target="_blank" href="<?php echo asset('storage/'.$cutperms->map_filepath) ?>"><img src="<?php echo asset('storage/'.$cutperms->map_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Approved Documents file') !!}
				    				<a target="_blank" href="<?php echo asset('storage/'.$cutperms->approveddocs_filepath) ?>"><img src="<?php echo asset('storage/'.$cutperms->approveddocs_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Volume') !!}
				    				{!! Form::text('volume',$cutperms->volume,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Species') !!}
				    				{!! Form::text('species',$cutperms->species,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Cutting Permit No.') !!}
				    				{!! Form::text('cutting_permitnum',$cutperms->cutting_permitnum,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Approved') !!}
				    				{!! Form::date('date_approved',$cutperms->date_approved,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Certification Fee') !!}
				    				{!! Form::text('certification_fee',$cutperms->certification_fee,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office:') !!}
				    				{{ App\Models\Offices::find($cutperms->office_id)->officename }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By:') !!}
				    				{{ Form::text('encoded_by', Auth::user($cutperms->encoded_by)->name, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Geotag Photos') !!}	
				    				@foreach(App\Models\cuttingpermit_geotag::where('f_id', $cutperms->id)->get() as $gphoto)
				    				<a target="_blank" href="<?php echo asset('storage/'.$gphoto->filepath) ?>"><img src="<?php echo asset('storage/'.$gphoto->filepath) ?>" alt="picture"></a>
				    				@endforeach
				    			</div>
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

@foreach($cutperm as $cutperms)
<div id="upload{{ $cutperms->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				
					<div class="modal-header">
			    		<h4 class="modal-title"></h4>
			    	</div>

				<div class="modal-body">
			    	{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\CuttingPermitController@upload_photo', $cutperms->id], 'files'=>true]) !!}
                            		<div class="form-group">
                                		<label for="title">Image</label>
                                		<input type="file" name="photos[]" class="form-control-file" multiple="">
                                		@if($errors->has('files'))
                                    		<span class="help-block text-danger">{{ $errors->first('files') }}</span>
                                		@endif
                                		{{ Form::text('rec_id', $cutperms->id, ['class'=>'form-control', 'hidden']) }}
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