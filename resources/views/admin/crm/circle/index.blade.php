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
                        Add New Circle
                    </button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Color</th>
                            <th scope="col">Circle</th>
                            <th scope="col">Description</th>
                            <th scope="col">Contact</th>
                            {{-- <th scope="col">Status</th> --}}
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach ($circle as $item)
                        <tr>
                            <td scope="row">{{ $item->number }}</td>
                            <td>{{ $item->color }}</td>
                            <td>{{ $item->circle_name }}</td>
                            <td>{{ $item->description }}</td>
                            @php
                                $userss = App\User::where('id', $item->assign_user_id)->get();
                            @endphp
                            <td>
                                @foreach ($userss as $usa)
                                {{ $usa->name }}
                                @endforeach
                            </td>
                            <td>Edit</td>
                            <td>
                                <form action="{{ route('admin.circle.destroy', $item->id)}}" method="post">
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
        <form action="{{ route('admin.save_circle') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Circle Name</label>
                    <input type="text" name="circle_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Color</label>
                    <input type="color" name="color" class="form-control">
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
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
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
