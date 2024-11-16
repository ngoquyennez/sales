@extends('sales.master')

@section('content')

<div class="card">
    <div class="card-header">Edit Sales</div>
    <div class="card-body">
        <form method="POST" action="{{route('sales.update', $sale->sale_id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">sale_id</label>
                <div class="col sm-10">
                    <input type="text" name="sale_id" class="form-control" value="{{$sale->sale_id}}" readonly />
                </div>
            </div>

            <div class="mb-3">
                <label for="medicine_id" class="form-label"> MedicineName</label>
                <select name="medicine_id" id="medicine_id" class="form-label" required>
                    @foreach ($medicines as $medicine)
                        <option value="{{$medicine->medicine_id}}">{{$medicine->medicine_id}}-{{$medicine->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">quantity</label>
                <div class="col sm-10">
                    <input type="text" name="quantity" class="form-control" value="{{$sale->quantity}}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">sale_date</label>
                <div class="col sm-10">
                    <input type="datetime-local" name="sale_date" class="form-control" value="{{$sale->sale_date}}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">customer_phone</label>
                <div class="col sm-10">
                    <input type="text" name="customer_phone" class="form-control" value="{{$sale->customer_phone}}" />
                </div>
            </div>

            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{$sale->sale_id}}" />
                <a href="{{route('sales.index')}}" class="btn btn-secondary">Home</a>
                <input type="submit" class="btn btn-primary" value="Update" />
            </div>
        </form>
    </div>
</div>
<script>

</script>
@endsection