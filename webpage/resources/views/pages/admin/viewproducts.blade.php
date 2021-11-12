@extends('layout.app')
 
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
	<h1>Products</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Názov</th>
                <th scope="col">Opis</th>
                <th scope="col">Dátum vytvorenia</th>
                <th scope="col">Akcia</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$task->id}}</th>
                <td><a href="/tasks/{{$task->id}}">{{$task->productTitle}}</a></td>
                <td>{{$task->productPrice}}</td>
                <td>{{$task->created_at->toFormattedDateString()}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-warning" href="{{ URL::to('products/' . $product->id . '/edit') }}">
                            Edit
                        </a>&nbsp;&nbsp;
                        <form action="{{url('products', [$product->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Vymazať"/>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection