@extends('admin.master')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-6 py-2">

            </div>

            <div class="col-6 py-2">
             <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add New Event
                    </button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>

                            <th scope="col">Event</th>
                            <th scope="col">Category</th>
                            <th scope="col">Scheduled</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach ($event as $item)
                        <tr>

                            <td>{{ $item->event }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->date }} {{ $item->time }} </td>
                            @php
                                $userss = App\User::where('id', $item->contract_id)->get();
                            @endphp
                            <td>
                                @foreach ($userss as $usa)
                                {{ $usa->name }}
                                @endforeach
                            </td>
                            <td>Edit</td>
                            <td>
                                <form action="{{ route('admin.event.destroy', $item->id)}}" method="post">
                                    @method('post')
                                    @csrf
                                    <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
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



    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.add_event') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Select Contact</label>
                    <select name="contract_id" class="form-control">
                        <option selected>Select One.</option>
                        @foreach (App\Contract::all() as $emm)
                            <option value="{{ $emm->id }}"> {{ $emm->name_prefix }} {{ $emm->f_name }}</option>
                        @endforeach
                        </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Assigner User</label>
                    <select name="assign_user_id" class="form-control">
                        <option selected>Select One.</option>
                        @foreach (App\User::all() as $em)
                            <option value="{{ $em->id }}">{{ $em->name }}</option>
                        @endforeach
                        </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Event</label>
                    <input type="text" name="event" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Visisble</label>
                    <select name="visible" class="form-control">
                    <option selected>Select One..</option>
                    <option selected value="Public">Public</option>
                    <option value="Private">Private</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Assigner User</label>
                    <select name="assign_id	" class="form-control">
                        <option selected>Select One.</option>
                        @foreach (App\User::all() as $em)
                            <option value="{{ $em->id }}">{{ $em->name }}</option>
                        @endforeach
                        </select>
                </div>
                <div class="row">
                        <div class="col-6">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Time</label>
                            <input type="time" name="time" class="form-control">
                        </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <input type="text" name="duration" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"> Category </label>
                    <select name="category" class="form-control">
                        <option selected>Select One...</option>
                        <option value="Demo">Demo</option>
                        <option value="Email">Email</option>
                        <option value="Fax">Fax</option>
                        <option value="Follow-Up">Follow-Up</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Meeting">Meeting</option>
                        <option value="Ship">Ship</option>
                        <option value="Thank-You">Thank-You</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control" required></textarea>
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
