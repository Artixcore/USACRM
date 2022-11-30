@extends('admin.master')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 py-4">
                <h2>Task List</h2>

            <div class="card">
                <div class="card-header"><a style="float: right;" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#task">Add New Task</a></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Start Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">Project</th>
                            <th scope="col">Priority</th>
                            <th scope="col">status</th>
                            {{-- <th scope="col">Edit</th> --}}
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($task as $item)
                        <tr>
                            <th scope="row">{{  date('d.m.Y', strtotime($item->task_start_date)) }}</th>
                            <td>{{ $item->task_title }}</td>
                            <td>{{ $item->task_project }}</td>
                            <td>{{ $item->task_priority }}</td>
                            <td>{{ $item->task_status }}</td>
                            {{-- <td><a href="" class="btn btn-outline-success"><i class="fas fa-edit"></i></a></td> --}}
                            <td>
                                <form action="{{ route('admin.task.delete', $item->id)}}" method="post">
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.save.calender') }}" method="post">
            @csrf
            <div class="modal-body">
            <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Task Title</label>
                    <input type="text" name="task_title" class="form-control" required>
                </div>
            </div>

            <div class="col-12">
            <div class="mb-3">
                    <label class="form-label">Project</label>
                    <input type="text" name="task_project" class="form-control" required>
            </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Est. Time</label>
                        <input type="text" name="task_est_time" class="form-control" required>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Time Spend</label>
                        <input type="text" name="task_time_spent" class="form-control" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="task_desc" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Tags</label>
                        <input type="text" name="task_tags" class="form-control" placeholder="Please Use  ,  after a value" required>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="task_status" class="form-control" required>
                            <option selected>Select One</option>
                            <option value="Open">Open</option>
                            <option value="Working">Working</option>
                            <option value="Review">Review</option>
                            <option value="Completed">Completed</option>
                            <option value="Follow Up">Follow Up</option>
                        </select>
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                        <label class="form-label">Repeat</label><br/>
                        <input type="checkbox" name="task_repeat" value="YES" class="form-check-input"> Yes
                        <input type="checkbox" name="task_repeat" value="NO" class="form-check-input"> No
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Priority</label>

                        <select name="task_priority" class="form-control" required>
                            <option selected>Select One</option>
                            <option value="Low">Low</option>
                            <option value="High">High</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id}}">
                        <select name="task_type" class="form-control" required>
                            <option selected>Select One</option>
                            <option value="Bug">Bug</option>
                            <option value="Support">Support</option>
                        </select>
                    </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="task_start_date" class="form-control" required>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                        <label class="form-label">Due Date</label>
                        <input type="date" name="task_due_date" class="form-control" required>
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
