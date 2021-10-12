@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">LAWIN Patrol Teams</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Create Team</a>
            <a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Assign Patroller</a>
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
@endsection