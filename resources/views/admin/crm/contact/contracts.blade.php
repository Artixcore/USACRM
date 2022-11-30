@extends('admin.master')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>

        @php
            $roles = App\User::all();
            $company = App\Company::all();
        @endphp

            <div class="col-6">
                <div class="card">
                    <div class="card-header"><h3> Add Contact </h3></div>
                    <form action="{{ route('admin.save_form') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-control">
                                    <option selected>Select One.</option>
                                    <option value="Lead">Lead</option>
                                    <option value="Prospect">Prospect</option>
                                    <option value="Client">Client</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Name Prefix</label>
                                <select name="name_prefix" class="form-control">
                                    <option selected>Select One.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Mrs.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Mx">Mx</option>
                                    <option value="Dr.">Dr.</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> First Name </label>
                                <input type="text" name="f_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Last Name </label>
                                <input type="text" name="l_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Email </label>
                                <input type="text" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Home Email (Optional) </label>
                                <input type="text" name="home_email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Work Email (Optional) </label>
                                <input type="text" name="work_email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Logo </label>
                                <input type="file" name="logo" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Coordinator </label>
                                <select name="coordinator" class="form-control">
                                    <option selected>Select One</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Assigned Person </label>
                                <select name="assigned_person" class="form-control">
                                    <option selected>Select One</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Company </label>
                                <select name="company_id" class="form-control">
                                    <option selected>Select One</option>
                                    @foreach ($company as $item)
                                    <option value="{{ $item->id }}"> {{ $item->company }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Email Marketing Audience </label>
                                <select name="e_m_a_id" class="form-control">
                                    <option selected>Select One</option>
                                    @foreach ($company as $item)
                                    <option value="{{ $item->id }}"> {{ $item->company }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Tags </label>
                                <input type="text" name="tags" class="form-control" placeholder="use comma">
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Title </label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Background Information </label>
                                <textarea type="text" name="bg_info" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Phone </label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Backup Phone </label>
                                <input type="text" name="bc_phone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Website </label>
                                <input type="text" name="website" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Skype </label>
                                <input type="text" name="skype" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-success"> Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
