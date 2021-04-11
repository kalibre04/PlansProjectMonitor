@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Forest Land Use Agreement for Tourism Purposes</h3>
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
                  @foreach($flagt as $flagts)
                  	<tr>
                  		<td>{{ $flagts->id }}</td>
                  		<td>{{ $flagts->applicant_name }}</td>
                  		<td>{{ $flagts->area }}</td>
                  		<td>{{ $flagts->date_award }}</td>
                  		<td>{{ $flagts->location }}</td>
                  		<td>{{ $flagts->status }}</td>
                  		<td>{{ $flagts->term }}</td>
                  		<td>{{ $flagts->expirationdate }}</td>
                  		<td><a href="#view{{ $flagts->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $flagts->encoded_by)

                  			@else
                  			<a href="#edit{{ $flagts->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  			<a href="#upload{{ $flagts->id }}" data-toggle="modal" class="btn btn-success btn-sm">Geotag Photos</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\FLAGTController@store', 'files'=>true]) !!}
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
				    				{!! Form::date('expirationdate',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
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
@foreach($flagt as $flagts)
<div id="edit{{ $flagts->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\FLAController@update', $flagts->id], 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$flagts->applicant_name,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$flagts->area,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$flagts->location,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$flagts->status,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Awarded') !!}
				    				{!! Form::date('date_award',$flagts->date_award,['class'=>'form-control']) !!}
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
				    				{!! Form::text('rentalfee',$flagts->rentalfee,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Term') !!}
				    				{{ Form::text('term', $flagts->term, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiry Date') !!}
				    				{!! Form::date('expirationdate',$flagts->expirationdate,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office') !!}
				    				{!! Form::select('office_id',$offices,$flagts->office_id,['class'=>'search-office', 'style'=>'width: 100%']) !!}
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


@foreach($flagt as $flagts)
<div id="view{{ $flagts->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\FLAController@show', $flagts->id], 'files'=>true]) !!}
							<div class="modal-header">
			    	<h4 class="modal-title">Edit Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Applicant Name') !!}
				    				{!! Form::text('applicant_name',$flagts->applicant_name,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Area') !!}
				    				{!! Form::text('area',$flagts->area,['class'=>'form-control','readonly' ]) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Location') !!}
				    				{!! Form::text('location',$flagts->location,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::text('status',$flagts->status,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Awarded') !!}
				    				{!! Form::date('date_award',$flagts->date_award,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Map file(image)') !!}
				    				<a target="_blank" href="<?php echo asset('storage/'.$flagts->map_filepath) ?>"><img src="<?php echo asset('storage/'.$flagts->map_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Approved Documents file') !!}
				    				<a target="_blank" href="<?php echo asset('storage/'.$flagts->approveddocs_filepath) ?>"><img src="<?php echo asset('storage/'.$flagts->approveddocs_filepath) ?>" alt="picture"></a>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Rental Fee') !!}
				    				{!! Form::text('rentalfee',$flagts->rentalfee,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Term') !!}
				    				{{ Form::text('term', $flagts->term, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiry Date') !!}
				    				{!! Form::date('expirydate',$flagts->expirydate,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office:') !!}
				    				{{ App\Models\Offices::find($flagts->office_id)->officename }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Encoded By:') !!}
				    				{{ Form::text('encoded_by', Auth::user($flagts->encoded_by)->name, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Geotag Photos') !!}	
				    				@foreach(App\Models\flagt_geotag::where('f_id', $flagts->id)->get() as $gphoto)
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

@foreach($flagt as $flagts)
<div id="upload{{ $flagts->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				
					<div class="modal-header">
			    		<h4 class="modal-title"></h4>
			    	</div>

				<div class="modal-body">
			    	{!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\FLAGTController@upload_photo', $flagts->id], 'files'=>true]) !!}
                            		<div class="form-group">
                                		<label for="title">Image</label>
                                		<input type="file" name="photos[]" class="form-control-file" multiple="">
                                		@if($errors->has('files'))
                                    		<span class="help-block text-danger">{{ $errors->first('files') }}</span>
                                		@endif
                                		{{ Form::text('rec_id', $flagts->id, ['class'=>'form-control', 'hidden']) }}
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