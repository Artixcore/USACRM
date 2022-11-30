@extends('freelancer.master')
@section('content')
<div class="col-8">
<div class="card">
<div class="card-header">
    <h2>Offer Table</h2>
</div>
<div class="card-body">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Number</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
          </tr>
        </thead>
        <tbody>
        {{-- @foreach ( as ) --}}
        <tr>
            <th></th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@</td>
        </tr>
        {{-- @endforeach --}}
        </tbody>
    </table>
</div>
</div>
</div>

<div class="col-4">
    <div class="card">
        <div class="card-header"> Outcome </div>
        <ul class="list-group">
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" >
              First checkbox
            </li>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" >
              Second checkbox
            </li>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" >
              Third checkbox
            </li>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" >
              Fourth checkbox
            </li>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" >
              Fifth checkbox
            </li>
          </ul>
    </div>
</div>


@endsection
