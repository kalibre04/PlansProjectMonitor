@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">LAWIN Patrol Teams</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="{{ url('lawinteams/create') }}" class="btn btn-primary" style="margin-bottom: 20px">Create Team</a>
            <a href="#assign" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Assign Patroller</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>TEAM ID</th>
                    <th>Office</th>
                    <th>Sector</th>
                    <th>Members</th>
                    <th>Quarter</th>
                    <th>Year</th>                  
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>                  
                </table>
        </div>
              <!-- /.card-body -->
</div>

<div id="assign" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">


    <div class="modal-content">
      <div class="modal-body">
        {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PatrolTeamsController@store', 'files'=>true]) !!}
          <div class="modal-header">
            <h4 class="modal-title">Patroller Assignment Module</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    {!! Form::label('','Patroller Name') !!}
                    {!! Form::select('patroller_id',$patrollers,null,['class'=>'search-appre', 'style'=>'width: 100%']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    {!! Form::label('','Sector') !!}
                    {!! Form::select('patrolteam_id',$patrolteams,null,['class'=>'search-appre', 'style'=>'width: 100%']) !!}
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