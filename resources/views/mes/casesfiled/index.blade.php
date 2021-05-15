@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Cases Filed</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Entry</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Date Filed</th>
                    <th>Respondent</th>
                    <th>Violation</th>
                    <th>Docket/IS No.</th>
                    <th>RTC Branch</th>
                    <th>Status</th>
                    <th>Office</th>
                    <th>Encoded By</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($casesfiled as $casefiled)
                  	<tr>
                  		<td>{{ $casefiled->id }}</td>
                  		<td>{{ $casefiled->date_filed }}</td>
                  		<td>{{ $casefiled->Respondent }}</td>
                  		<td>{{ $casefiled->violation }}</td>
                  		<td>{{ $casefiled->docketnum }}</td>
                  		<td>{{ $casefiled->rtcbranch }}</td>
                  		<td>{{ $casefiled->status }}</td>
                  		<td>{{ App\Models\Offices::find($casefiled->office_id)->officename }}</td>
                  		<td>{{ Auth::user($casefiled->encoded_by)->name }}</td>
                  		<td><a href="#view{{ $casefiled->id }}" data-toggle="modal" class="btn btn-success btn-sm">VIEW</a>

                  			@if(Auth::user()->id != $casefiled->encoded_by)
                  				@if(Auth::user()->acctype == '165')
                  					<a href="#edit{{ $casefiled->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                  				@else

                  				@endif
                  			@else
                  			<a href="#edit{{ $casefiled->id }}" data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
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
 			{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\CasesFiledController@store']) !!}
				<div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
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
				    				{!! Form::label('','Violation') !!}
				    				{!! Form::text('violation',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Docket/IS No.') !!}
				    				{!! Form::text('docketnum',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Filed') !!}
				    				{!! Form::date('date_filed', \Carbon\Carbon::now(), ['class'=>'']); !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','RTC Branch') !!}
				    				{!! Form::text('rtcbranch',null,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::textarea('status',null,['class'=>'form-control']) !!}
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
@foreach($casesfiled as $casefiled)
<div id="edit{{ $casefiled->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\CasesFiledController@update', $casefiled->id]]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Respondent') !!}
				    				{!! Form::text('repondent',$casefiled->respondent,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Violation') !!}
				    				{!! Form::text('violation', $casefiled->violation,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Docket/IS No.') !!}
				    				{!! Form::text('docketnum',$casefiled->docketnum,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Filed') !!}
				    				{!! Form::date('date_filed', $casefiled->date_filed, ['class'=>'']); !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','RTC Branch') !!}
				    				{!! Form::text('rtcbranch',$casefiled->rtcbranch,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::textarea('status',$casefiled->status,['class'=>'form-control']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Office') !!}
				    				{!! Form::select('office_id',$offices,$casefiled->office_id,['class'=>'search-office', 'style'=>'width: 100%']) !!}
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


@foreach($casesfiled as $casefiled)
<div id="view{{ $casefiled->id }}" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">


 		<div class="modal-content">
 			<div class="modal-body">
 				{!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\CasesFiledController@update', $casefiled->id]]) !!}
			    <div class="modal-header">
			    	<h4 class="modal-title">Add Entry</h4>
			    </div>
			    <div class="modal-body">
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Respondent') !!}
				    				{!! Form::text('repondent',$casefiled->respondent,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Violation') !!}
				    				{!! Form::text('violation', $casefiled->violation,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Docket/IS No.') !!}
				    				{!! Form::text('docketnum',$casefiled->docketnum,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Date Filed') !!}
				    				{!! Form::date('date_filed', $casefiled->date_filed, ['class'=>'', 'readonly']); !!}
				    			</div>
				    		</div>
				    	</div>
				       <div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','RTC Branch') !!}
				    				{!! Form::text('rtcbranch',$casefiled->rtcbranch,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				{!! Form::label('','Status') !!}
				    				{!! Form::textarea('status',$casefiled->status,['class'=>'form-control', 'readonly']) !!}
				    			</div>
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    				<label>Office</label>
				    				<input name='office_id' value='{{ App\Models\Offices::find($casefiled->office_id)->officename }}' readonly="true"></input>
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