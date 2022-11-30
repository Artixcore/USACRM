@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container py-4">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add New User
                </button>
            </div>
            <div class="card-body">
    <table class="table" id="table">
        <thead>
          <tr>
            <th scope="col">SL.</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($users as $key=> $item)
    <tr>
        <td> {{$users->firstItem()+$key}} </td>
        <td> {{$item->name}} </td>
        <td> {{implode(',', $item->roles()->get()->pluck('urole')->toArray()) }} </td>
        <td> {{$item->email}}</td>
        <td>
            @can('edit-users')
            <a href="{{route('admin.users.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
            @endcan
        </td>
        <td>
            <form action="{{ route('admin.users.destroy', $item->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button onclick="return myFunction();" class="btn btn-outline-danger" type="submit"> <i class="fas fa-trash-alt"></i> </button>
            </form>
        </td>
    </tr>
    @endforeach
        </tbody>
      </table>
    {{ $item->links }}
</div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.agent.new') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <input type="file" name="avatar" class="form-control-file" required>
            </div>
            <div class="mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="f_name" placeholder="First Name" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="l_name" placeholder="Last Name" class="form-control" required>
            </div>
            <div class="mb-3">
                <select name="urole" class="form-control" required>
                <option selected>Select Role.</option>
                <option value="admin">Admin</option>
                <option value="author">Freelancer</option>
                <option>User</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="number" name="hourly_rate" placeholder="Hourly Rate" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="phone" name="phone" placeholder="Phone Number" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('footer_js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endsection
