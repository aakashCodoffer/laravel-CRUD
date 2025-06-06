@extends('layout')

@section('title', 'List Of Cars Model')

@section('content')
    <a href="/cars/create" class="block">Add New One</a>

     <table class='table-fixed hight  text-left '>
        <thead class='  fs-5 rounded-top text-black border border-bottom-0'>
            <tr class="">
                <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>id</th>
                <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>brand-name</th>
                <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>name-plate</th>
                <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>year</th>
                <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>edit</th>
                <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>delete</th>
            </tr>
        </thead>
        <tbody >
        @foreach ($cars as $value )
         <tr>
                <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">{{ $value['id'] }}</td>
                <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">{{ $value['brand_name'] }}</td>
                <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">{{ $value['name_plate'] }}</td>
                <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">{{ $value['yearOfPurchase'] }}</td>
                <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg"><a href="/cars/{{ $value["id"] }}/edit">Edit</a></td>
                <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg"><a href="/cars/{{ $value["id"] }}/delete">Delete</a></td>
            </tr>
        @endforeach
    
        </tbody>  
    </table>
@endsection