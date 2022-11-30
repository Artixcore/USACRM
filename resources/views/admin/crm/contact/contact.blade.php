@extends('admin.master')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Role</th>
                                <th scope="col">Primary Email</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Created</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>

                            @foreach ($contact as $item)
                            @php
                            $co = App\Company::where('id', $item->company_id)->get();
                            @endphp
                            <tr>
                                <th scope="row">{{ $item->con_number }}</th>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @foreach ($co as $im)
                                        {{ $im->company }}
                                    @endforeach
                                </td>
                                <td> {{ $item->created_at->diffForHumans() }} </td>
                                <td> <a href="#" class="btn btn-outline-warning"> <i class="far fa-edit"></i> </a> </td>
                                <td>
                                    <form action="{{ route('admin.contact.delete', $item->id)}}" method="post">
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


            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                    <a style="width: 100%;" href="{{ route('admin.contact') }}" class="btn btn-outline-success btn-lg btn-block"> Create New Contact </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
