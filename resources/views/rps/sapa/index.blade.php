@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Special Agreement on Protected Area</h3>
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
                    <th>Name</th>
                    <th>Area</th>
                    <th>Date Awarded</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Term</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($sapa as $sapaa)
                  	<tr>
                  		<td>{{ $sapaa->id }}</td>
                  		<td>{{ $sapaa->applicant_name }}</td>
                  		<td>{{ $sapaa->area }}</td>
                  		<td>{{ $sapaa->date_award }}</td>
                  		<td>{{ $sapaa->location }}</td>
                  		<td>{{ $sapaa->status }}</td>
                  		<td>{{ $sapaa->term }}</td>
                  		<td>{{ $sapaa->expirydate }}</td>
                  		<td><a href="#view{{ $sapaa->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $sapaa->encoded_by)

                  			@else
                  			<a href="#edit{{ $sapaa->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			<a href="#upload{{ $sapaa->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\SAPAController@store', 'files'=>true]) !!}
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
				    				{!! Form::label('','Rental Fee') !!}
				    				{!! Form::text('rentalfee',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Term') !!}
				    				{{ Form::text('term', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiry Date') !!}
				    				{!! Form::date('expirydate',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
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
@foreach($sapa as $sapaa)
<div id="edit{{ $sapaa->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\SAPAController@update', $sapaa->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$sapaa->applicant_name,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$sapaa->area,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$sapaa->location,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$sapaa->status,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Awarded') !!}
				    				{!! Form::date('date_award',$sapaa->date_award,['class'=>'form-control']) !!}
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
				    				{!! Form::label('','Rental Fee') !!}
				    				{!! Form::text('rentalfee',$sapaa->rentalfee,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Term') !!}
				    				{{ Form::text('term', $sapaa->term, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiry Date') !!}
				    				{!! Form::date('expirydate',$sapaa->expirydate,['class'=>'form-control']) !!}
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


@foreach($sapa as $sapaa)
<div id="view{{ $sapaa->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\SAPAController@show', $sapaa->id], 'files'=>true]) !!}
							<div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$sapaa->applicant_name,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$sapaa->area,['class'=>'form-control','readonly' ]) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$sapaa->location,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$sapaa->status,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Awarded') !!}
				    				{!! Form::date('date_award',$sapaa->date_award,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Map file(image)') !!}
				    				<a target="_blank" href="<?php echo asset('storage/'.$sapaa->map_filepath) ?>"><img src="<?php echo asset('storage/'.$sapaa->map_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Approved Documents file') !!}
				    				<a target="_blank" href="<?php echo asset('storage/'.$sapaa->approveddocs_filepath) ?>"><img src="<?php echo asset('storage/'.$sapaa->approveddocs_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Rental Fee') !!}
				    				{!! Form::text('rentalfee',$sapaa->rentalfee,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Term') !!}
				    				{{ Form::text('term', $sapaa->term, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiry Date') !!}
				    				{!! Form::date('expirydate',$sapaa->expirydate,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office:') !!}
				    				{{ App\Models\Offices::find($sapaa->office_id)->officename }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By:') !!}
				    				{{ Form::text('encoded_by', Auth::user($sapaa->encoded_by)->name, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Geotag Photos') !!}	
				    				@foreach(App\Models\sapa_geotag::where('f_id', $sapaa->id)->get() as $gphoto)
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

@foreach($sapa as $sapaa)
<div id="upload{{ $sapaa->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				
					<div class="modal-header">
			    		<h4 class="modal-title"></h4>
			    	</div>

				<div class="modal-body">
			    	{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\SAPAController@upload_photo', $sapaa->id], 'files'=>true]) !!}
                            		<div class="form-group">
                                		<label for="title">Image</label>
                                		<input type="file" name="photos[]" class="form-control-file" multiple="">
                                		@if($errors->has('files'))
                                    		<span class="help-block text-danger">{{ $errors->first('files') }}</span>
                                		@endif
                                		{{ Form::text('rec_id', $sapaa->id, ['class'=>'form-control', 'hidden']) }}
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