@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2>Appointment List</h2>

            <div class="card">
                <div class="card-header"><a style="float: right;" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#task">Add New Task</a></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Appointment Type</th>
                            <th scope="col">Staff Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($app as $item)
                        <tr>
                            <td>{{ $item->app_type }}</td>
                            <td>{{ $item->app_staff_event_booked }}</td>
                            <td>{{ $item->app_status }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('admin.app.delete', $item->id)}}" method="post">
                                    @method('post')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                      </table>
                </div>
            </div>
            </div>

        </div>
    </div>


    <!-- Add task -->
<div class="modal fade" id="task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.app.save') }}" method="post">
            @csrf
            <div class="modal-body">
            <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Appointment Type</label>
                    <input type="text" name="app_type" class="form-control" required>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Success Message</label>
                        <input type="text" name="app_success_message" class="form-control" required>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="app_button_text" class="form-control" required>
                </div>
            </div>

             <div class="col-12">
                <div class="mb-3">
                        <label class="form-label">Which Staff Member will be assigned to Events booked on this Appointment Type? *</label>
                        <select name="app_staff_event_booked" class="form-control" required>
                            <option selected>Select One</option>
                           @foreach ($staff as $im)
                           <option value="{{ $im->name }}">{{ $im->name }}</option>
                           @endforeach

                        </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                        <label class="form-label">Select Staff Members whom will be notified when an Appointment is created.</label>
                        <select name="app_notify_staff" class="form-control" required>
                            <option selected>Select One</option>
                           @foreach ($staff as $im)
                           <option value="{{ $im->name }}">{{ $im->name }}</option>
                           @endforeach

                        </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="app_desc" class="form-control" required></textarea>
                </div>
            </div>

            </div>
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
