@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Lumber Donated</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Entry</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Apprehension Date</th>
                    <th>Volume Donated</th>
                    <th>Bidder</th>
                    <th>Office</th>
                    <th>Encoded By</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($lumberdonate as $lumberdonated)
                  	<tr>
                  		<td>{{ $lumberdonated->id }}</td>
                  		<td>{{ App\Models\Apprehension::find($lumberdonated->appre_id)->date_apprehended }}</td>
                  		<td>{{ $lumberdonated->volumedonated }}</td>
                  		<td>{{ $lumberdonated->bidder }}</td>
                  		<td>{{ App\Models\Offices::find($lumberdonated->office_id)->officename }}</td>
                  		<td>{{ Auth::user($lumberdonated->encoded_by)->name }}</td>
                  		<td><a href="#view{{ $lumberdonated->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $lumberdonated->encoded_by)

                  			@else
                  			<a href="#edit{{ $lumberdonated->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\LumberDonationController@store']) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Apprehension Date') !!}
				    				{!! Form::select('appre_id',$apprehensionss,null,['class'=>'search-appre', 'style'=>'width: 100%']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Donated') !!}
				    				{!! Form::date('date_donated', \Carbon\Carbon::now(), ['class'=>'']); !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Volume Donated') !!}
				    				{!! Form::text('volumedonated',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Bidder') !!}
				    				{!! Form::text('bidder',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Purpose') !!}
				    				{!! Form::text('purpose',null,['class'=>'form-control']) !!}
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
@foreach($lumberdonate as $lumberdonated)
<div id="edit{{ $lumberdonated->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\LumberDonationController@update', $lumberdonated->id]]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Apprehension Date') !!}
				    				{!! Form::select('appre_id',$apprehensionss,$lumberdonated->appre_id,['class'=>'search-appre', 'style'=>'width: 100%']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Donated') !!}
				    				{!! Form::date('date_donated', $lumberdonated->date_donated, ['class'=>'']); !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Volume Donated') !!}
				    				{!! Form::text('volumedonated',$lumberdonated->volumedonated,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Bidder') !!}
				    				{!! Form::text('bidder',$lumberdonated->bidder,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Purpose') !!}
				    				{!! Form::text('purpose',$lumberdonated->purpose,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office') !!}
				    				{!! Form::select('office_id',$offices,$lumberdonated->office_id,['class'=>'search-office', 'style'=>'width: 100%']) !!}
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


@foreach($lumberdonate as $lumberdonated)
<div id="view{{ $lumberdonated->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\LumberDonationController@update', $lumberdonated->id]]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				<label>Date Apprehended</label>
				    				<input name='appre_id' value='{{ App\Models\Apprehension::find($lumberdonated->appre_id)->date_apprehended }}' readonly="true"></input>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Donated') !!}
				    				{!! Form::date('date_donated', $lumberdonated->date_donated, ['class'=>'', 'readonly']); !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Volume Donated') !!}
				    				{!! Form::text('volumedonated',$lumberdonated->volumedonated,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Bidder') !!}
				    				{!! Form::text('bidder',$lumberdonated->bidder,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Purpose') !!}
				    				{!! Form::text('purpose',$lumberdonated->purpose,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				<label>Office</label>
				    				<input name='office_id' value='{{ App\Models\Offices::find($lumberdonated->office_id)->officename }}' readonly="true"></input>
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