@extends('sales.master')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif
<div class="container mt-5">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Sales Manage</b></h1>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b></b></div>

            <div class="col col-md-6">
                <a href="{{route('sales.create')}}" class="btn btn-success btn-sm float-end">Create</a>


            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>medicine name</th>
                <th>quantity</th>
                <th>date</th>
                <th>customer phone</th>
                
                <th>Action</th>

            </tr>
            @if (count($sales) > 0)
                @foreach ($sales as $row)
                    <tr>

                        <td>{{$row->sale_id}}</td>
                        <td>{{$row->medicine->name}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->sale_date}}</td>
                        <td>{{$row->customer_phone}}</td>
                        
                        <td>
                            <form method="post" action="{{route('sales.destroy', $row->sale_id)}}">
                                @csrf
                                @method('DELETE')
                               
                                <a href="{{route('sales.edit', $row->sale_id)}}" class="btn btn-primary">Edit</a>
                                <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want delete sale ?')" value="Delete">
                            </form>
                        </td>
                    </tr>

                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No date found</td>
                </tr>
            @endif
        </table>
        {!! $sales->links() !!}
    </div>
</div>
@endsection