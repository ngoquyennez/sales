@extends('sales.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">Add Sale</div>
    <div class="crad-body">
        <form method="post" action="{{route('sales.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="medicine_id" class="form-label">MedicineName</label>
                <select name="medicine_id" id="medicine_id" class="form-label" required>
                    @foreach ($medicines as $medicine)
                        <option value="{{$medicine->medicine_id}}">{{$medicine->medicine_id}}-{{$medicine->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <label for="quantity" class="col-sm-2 col-label-form">quantity</label>
                <div class="col-sm-10">
                    <input type="text" name="quantity" id="quantity" class="form-control" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="sale_date" class="col-sm-2 col-label-form">sale_date</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="sale_date" id="sale_date" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="customer_phone" class="col-sm-2 col-label-form">customer_phone</label>
                <div class="col-sm-10">
                    <input type="text" name="customer_phone" id="customer_phone" class="form-control" required>
                </div>
            </div>
            
            <div class="text-center">
                <a href="{{route('sales.index')}}" class="btn btn-secondary">Home</a>
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
            </div>
            </div>
            
            
        </form>
    </div>
</div>

@endsection('content')