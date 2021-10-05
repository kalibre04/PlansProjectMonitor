@extends('template')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">LAWIN Patrol Teams</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<a href="#create" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 20px">Add Team</a>
                <table id="tabledata1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Fullname</th>
                    <th>Position</th>
                    <th>Office</th>                  
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
