@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">

            </div>

            <div class="col-6">
             <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add New Agent
                    </button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        @foreach ($agent as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->f_name }}</td>
                            <td>{{ $item->l_name }}</td>
                            <td>{{implode(',', $item->roles()->get()->pluck('urole')->toArray()) }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>Edit</td>
                            <td>
                                <form action="{{ route('company.destroy', $item->id)}}" method="post">
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
        <form action="{{ route('company.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Company Logo</label>
                    <input type="file" name="company_logo" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact</label>
                    <select name="company_contract_user_id" class="form-control">
                        <option selected>Select One.</option>
                        <option value="Contact">Contact</option>
                        {{-- @foreach (App\Contact::all() as $em)
                            <option value="{{ $em->id }}">{{ $em->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Category</label>
                        <select name="company_category" class="form-control">
                            <option value="Communication">Communication</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Software Development">Software Development</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Website</label>
                        <input type="text" name="company_website" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Phone</label>
                        <input type="text" name="company_phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Skype</label>
                        <input type="text" name="company_skype" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tags</label>
                        <input type="text" name="company_tags" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Address</label>
                        <textarea type="text" name="company_address" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Background Info</label>
                        <textarea type="text" name="company_bg_info" class="form-control"></textarea>
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

@endsection
