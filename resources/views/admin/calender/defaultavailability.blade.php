@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">

            </div>

            <div class="col-6">
                <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Add Default Daily Availability
                    </button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL.</th>
                                <th scope="col">Day</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">Edit</th> --}}
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($day as $days)
                            <tr>
                                <td>{{ $days->id }}</td>
                                <td>{{ $days->day }}</td>
                                <td>{{  date('h:i A', strtotime($days->day_start)) }}</td>
                                <td>{{  date('h:i A', strtotime($days->day_end)) }}</td>
                                <td>@if ($days->day_status=='Active')
                                    <button class="btn btn-outline-success">Active</button>
                                @else
                                <button class="btn btn-outline-danger">Inactive</button>
                                @endif
                                </td>
                                <td>

                                    <form action="{{ route('day.day.delete', $days->id)}}" method="post">
                                        @method('post')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>


                                    {{-- <a class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a> --}}
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Default Availability </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('day.day.new') }}" method="POST">
            @csrf
            <div class="modal-body">
            <div class="container">
                <div class="row">

                <div class="mb-3">
                <label class="form-label">Select Day</label>
                <select name="day" class="form-control">
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select>
                </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <input type="time" name="day_start" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <input type="time" name="day_end" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="mb-3">
                <select name="day_status" class="form-control">
                    <option selected>Select one..</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </div>
        </div>
    </div>
        </form>
      </div>
    </div>

@endsection
