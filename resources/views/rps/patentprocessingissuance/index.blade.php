@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Patent Processing and Issuance</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">


        				@if (count($errors) > 0)
								<div class="alert alert-danger">
							    <strong>Sorry!</strong> There were problems with your input <br><br>
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
                    <th>Name</th>
                    <th>Application No.</th>
                    <th>Date Applied</th>
                    <th>Location</th>
                    <th>Lot & Survey No.</th>
                    <th>Mode of Desposition</th>
                    <th>Patent No.</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($patentprocessingissuances as $patentprocessingissuance)
                  	<tr>
                  		<td>{{ $patentprocessingissuance->id }}</td>
                  		<td>{{ $patentprocessingissuance->name }}</td>
                  		<td>{{ $patentprocessingissuance->application_num }}</td>
                  		<td>{{ $patentprocessingissuance->dateapplied }}</td>
                  		<td>{{ $patentprocessingissuance->location }}</td>
                  		<td>{{ $patentprocessingissuance->lotnsurveynum }}</td>
                  		<td>{{ $patentprocessingissuance->modeofdisposition }}</td>
                  		<td>{{ $patentprocessingissuance->patentnum }}</td>
                  		<td><a href="#view{{ $patentprocessingissuance->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $patentprocessingissuance->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $patentprocessingissuance->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a><a href="#upload{{ $patentprocessingissuance->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
                  				@else

                  				@endif

                  			@else
                  			<a href="#edit{{ $patentprocessingissuance->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			<a href="#upload{{ $patentprocessingissuance->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PatentProcessingAndIssuanceController@store', 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Add Patent</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('name',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Application file(image)') !!}
				    				{!! Form::file('application_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Application No.') !!}
				    				{!! Form::text('application_num',null,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Date Applied') !!}
				    				{!! Form::date('dateapplied',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
				    				{!! Form::label('','location') !!}
				    				{!! Form::text('location',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Lot & Survey No.') !!}
				    				{!! Form::text('lotnsurveynum',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Mode of Disposition') !!}
				    				{{ Form::text('modeofdisposition', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Patent No.') !!}
				    				{{ Form::text('patentnum', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{{ Form::select('status', $status, 'Approved', ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Title(Image)') !!}
				    				{!! Form::file('title_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Survey Approval Date') !!}
				    				{!! Form::date('datesurveyapproved',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
@foreach($patentprocessingissuances as $patentprocessingissuance)
<div id="edit{{ $patentprocessingissuance->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\PatentProcessingAndIssuanceController@update', $patentprocessingissuance->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Patent</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('name',$patentprocessingissuance->name,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Application file(image)') !!}
				    				{!! Form::file('application_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Application No.') !!}
				    				{!! Form::text('application_num',$patentprocessingissuance->application_num,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$patentprocessingissuance->area,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Applied') !!}
				    				{!! Form::date('dateapplied',$patentprocessingissuance->dateapplied,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Issued') !!}
				    				{!! Form::date('dateissued',$patentprocessingissuance->dateissued,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','location') !!}
				    				{!! Form::text('location',$patentprocessingissuance->location,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Lot & Survey No.') !!}
				    				{!! Form::text('lotnsurveynum',$patentprocessingissuance->lotnsurveynum,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Mode of Disposition') !!}
				    				{{ Form::text('modeofdisposition', $patentprocessingissuance->modeofdisposition, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Patent No.') !!}
				    				{{ Form::text('patentnum', $patentprocessingissuance->patentnum, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{{ Form::select('status', array('Approved'=>'Approved', 'Pending'=>'Pending', 'Cancelled'=>'Cancelled'), $patentprocessingissuance->status, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Title(Image)') !!}
				    				{!! Form::file('title_image',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Survey Approval Date') !!}
				    				{!! Form::date('datesurveyapproved',$patentprocessingissuance->datesurveyapproved,['class'=>'form-control']) !!}
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


@foreach($patentprocessingissuances as $patentprocessingissuance)
<div id="view{{ $patentprocessingissuance->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\PatentProcessingAndIssuanceController@show', $patentprocessingissuance->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">View Patent</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('name',$patentprocessingissuance->name,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Application') !!}
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$patentprocessingissuance->application_filepath) ?>"><img src="<?php echo asset('/public/storage/'.$patentprocessingissuance->application_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Application No.') !!}
				    				{!! Form::text('application_num',$patentprocessingissuance->application_num,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$patentprocessingissuance->area,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Applied') !!}
				    				{!! Form::date('dateapplied',$patentprocessingissuance->dateapplied,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Issued') !!}
				    				{!! Form::date('dateissued',$patentprocessingissuance->dateissued,['class'=>'form-control','readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','location') !!}
				    				{!! Form::text('location',$patentprocessingissuance->location,['class'=>'form-control','readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Lot & Survey No.') !!}
				    				{!! Form::text('lotnsurveynum',$patentprocessingissuance->lotnsurveynum,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Mode of Disposition') !!}
				    				{{ Form::text('modeofdisposition', $patentprocessingissuance->modeofdisposition, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Patent No.') !!}
				    				{{ Form::text('patentnum', $patentprocessingissuance->patentnum, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{{ Form::text('status', $patentprocessingissuance->status, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Title') !!}
				    				<a target="_blank" href="<?php echo asset('/public/storage/'.$patentprocessingissuance->title_filepath) ?>"><img src="<?php echo asset('/public/storage/'.$patentprocessingissuance->title_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By') !!}
				    				{{ Form::text('encoded_by', Auth::user($patentprocessingissuance->encoded_by)->name, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office:') !!}
				    				{{ App\Models\Offices::find($patentprocessingissuance->office_id)->officename }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Geotag Photos') !!}	
				    				@foreach(App\Models\Patent_Geotag::where('f_id', $patentprocessingissuance->id)->get() as $gphoto)
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

@foreach($patentprocessingissuances as $patentprocessingissuance)
<div id="upload{{ $patentprocessingissuance->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				
					<div class="modal-header">
			    		<h4 class="modal-title"></h4>
			    	</div>

				<div class="modal-body">
			    	{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\PatentProcessingAndIssuanceController@upload_photo', $patentprocessingissuance->id], 'files'=>true]) !!}
                            		<div class="form-group">
                                		<label for="title">Image</label>
                                		<input type="file" name="photos[]" class="form-control-file" multiple="">
                                		@if($errors->has('files'))
                                    		<span class="help-block text-danger">{{ $errors->first('files') }}</span>
                                		@endif
                                		{{ Form::text('rec_id', $patentprocessingissuance->id, ['class'=>'form-control', 'hidden']) }}
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
			<!--		<div class="container">
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