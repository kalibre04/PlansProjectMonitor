@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Chainsaw Inventory</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Entry</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Date Acquired</th>
                    <th>Serial No.</th>
                    <th>Date Registered</th>
                    <th>Expiration Date</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($chainregs as $chainreg)
                  	<tr>
                  		<td>{{ $chainreg->id }}</td>
                  		<td>{{ $chainreg->name }}</td>
                  		<td>{{ $chainreg->address }}</td>
                  		<td>{{ $chainreg->dateacquired }}</td>
                  		<td>{{ $chainreg->serialnum }}</td>
                  		<td>{{ $chainreg->dateregistered }}</td>
                  		<td>{{ $chainreg->expirationdate }}</td>
                  		<td><a target="_blank" href="<?php echo asset('/public/storage/'.$chainreg->filepath) ?>"><img src="<?php echo asset('/public/storage/'.$chainreg->filepath) ?>" alt="picture"></a></td>
                  		<td><a href="#view{{ $chainreg->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $chainreg->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $chainreg->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  				@else

                  				@endif
                  			@else
                  			<a href="#edit{{ $chainreg->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\ChainsawRegController@store', 'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Add Chainsaw</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Name') !!}
				    				{!! Form::text('name',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Address') !!}
				    				{!! Form::text('address',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Acquired') !!}
				    				{!! Form::date('dateacquired',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Serial No.') !!}
				    				{!! Form::text('serialnum',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Registered') !!}
				    				{!! Form::date('dateregistered',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiration Date') !!}
				    				{!! Form::date('expirationdate',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Brand') !!}
				    				{{ Form::text('brand', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Model') !!}
				    				{{ Form::text('model', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Horsepower') !!}
				    				{{ Form::text('horsepower', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Color') !!}
				    				{{ Form::text('color', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Guidebar Length') !!}
				    				{{ Form::text('guidebarlength', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','OR no.') !!}
				    				{{ Form::text('or_num', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','CR no.') !!}
				    				{{ Form::text('cr_num', null, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Purpose') !!}
				    				{{ Form::text('purpose', null, ['class'=>'form-control']) }}
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
				    				{{ Form::text('encoded_by', Auth::user()->id, ['class'=>'form-control']) }}
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
@foreach($chainregs as $chainreg)
<div id="edit{{ $chainreg->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 			{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\ChainsawRegController@update', $chainreg->id],'files'=>true]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Chainsaw details</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Name') !!}
				    				{!! Form::text('name',$chainreg->name,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Address') !!}
				    				{!! Form::text('address',$chainreg->address,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Acquired') !!}
				    				{!! Form::date('dateacquired',$chainreg->dateacquired,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Serial No.') !!}
				    				{!! Form::text('serialnum',$chainreg->serialnum,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Registered') !!}
				    				{!! Form::date('dateregistered',$chainreg->dateregistered,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiration Date') !!}
				    				{!! Form::date('expirationdate',$chainreg->expirationdate,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Brand') !!}
				    				{{ Form::text('brand', $chainreg->brand, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Model') !!}
				    				{{ Form::text('model', $chainreg->model, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Horsepower') !!}
				    				{{ Form::text('horsepower', $chainreg->horsepower, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Color') !!}
				    				{{ Form::text('color', $chainreg->color, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Guidebar Length') !!}
				    				{{ Form::text('guidebarlength', $chainreg->guidebarlength, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','OR no.') !!}
				    				{{ Form::text('or_num', $chainreg->or_num, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','CR no.') !!}
				    				{{ Form::text('cr_num', $chainreg->cr_num, ['class'=>'form-control']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Purpose') !!}
				    				{{ Form::text('purpose', $chainreg->purpose, ['class'=>'form-control']) }}
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
				    				{{ Form::text('encoded_by', Auth::user()->id, ['class'=>'form-control']) }}
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


@foreach($chainregs as $chainreg)
<div id="view{{ $chainreg->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\MonitoringStationController@store', $chainreg->id]]) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Edit Chainsaw details</h4>
			    </div>
			    <div class="modal-body">
			    		<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Name') !!}
				    				{!! Form::text('name',$chainreg->name,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Address') !!}
				    				{!! Form::text('address',$chainreg->address,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Acquired') !!}
				    				{!! Form::date('dateacquired',$chainreg->dateacquired,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Serial No.') !!}
				    				{!! Form::text('serialnum',$chainreg->serialnum,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Registered') !!}
				    				{!! Form::date('dateregistered',$chainreg->dateregistered,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Expiration Date') !!}
				    				{!! Form::date('expirationdate',$chainreg->expirationdate,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Brand') !!}
				    				{{ Form::text('brand', $chainreg->brand, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Model') !!}
				    				{{ Form::text('model', $chainreg->model, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Horsepower') !!}
				    				{{ Form::text('horsepower', $chainreg->horsepower, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Color') !!}
				    				{{ Form::text('color', $chainreg->color, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Guidebar Length') !!}
				    				{{ Form::text('guidebarlength', $chainreg->guidebarlength, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','OR no.') !!}
				    				{{ Form::text('or_num', $chainreg->or_num, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','CR no.') !!}
				    				{{ Form::text('cr_num', $chainreg->cr_num, ['class'=>'form-control', 'readonly']) }}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Purpose') !!}
				    				{{ Form::text('purpose', $chainreg->purpose, ['class'=>'form-control', 'readonly']) }}
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
@endforeach



@endsection