@extends('layout')

@section('title', $car_title)

@section('content')

    @if ($car_type === 'index')
        <a href="/cars/create" class="block">Add New One</a>
        <table class='table-fixed hight  text-left '>
            <thead class='  fs-5 rounded-top text-black border border-bottom-0'>
                <tr class="">
                    <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>id</th>
                    <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>brand-name</th>
                    <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>name-plate</th>
                    <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>year</th>
                    <th class='fw-light fs-4 px-7 py-2 rounded-tl-lg'>edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $value)
                    <tr>
                        <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">{{ $value['id'] }}</td>
                        <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg"> <a
                                href="{{ route('cars.show', $value->id) }}">{{ $value['brand_name'] }}</a></td>
                        <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">{{ $value['name_plate'] }}</td>
                        <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">{{ $value['yearOfPurchase'] }}</td>
                        <td class="fw-light fs-6 px-7 py-2 rounded-tl-lg">
                            <a href={{ route('cars.edit', $value->id) }}>Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif ($car_type === 'add' || $car_type === 'edit')
        {{-- @dd($car_type) --}}
        <div class="flex justify-center items-center h-full w-full pt-10">
            {{-- <p class="bg-primary text-light p-2">User ID: {{ $ID }}</p> --}}

            <form method="POST" action="{{ $car_type === 'edit' ? route('cars.update', $car->id) : route('cars.store') }}" class="  bg-white  p-7 rounded-t-xl space-y-1 ">
                @csrf
                @method($car_type == "edit" ? "PUT" : "POST")
            
                
                <p id='error' class='text-sm font-light text-red-500 '></p>
                <label class="text-lg font-light" for="brand_name">Brand Name:</label>
                <input class="border pl-3 rounded-lg py-1 mb-2 w-full border-gray-300"
                    value="{{ $car_type === 'edit' ? $car['brand_name'] : '' }}" type="text" id="brand_name"
                    name="brand_name">

                <label class="text-lg font-light" for="name_plate">Name-Plate:</label>
                <input class="border pl-3 rounded-lg mb-2 py-1 w-full border-gray-300"
                    value="{{ $car_type === 'edit' ? $car['name_plate'] : '' }}" type="text" id="name_plate"
                    name="name_plate">

                <label class="text-lg font-light" for="year">Year of Purchase:</label>
                <input class="pl-3 border rounded-lg mb-2 py-1 w-full border-gray-300"
                    value="{{ $car_type === 'edit' ? $car['yearOfPurchase'] : '' }}" type="number" id="year"
                    name="yearOfPurchase">
                <p id='error' class='text-sm font-medium text-red-500'></p>
                <div class="flex justify-between items-center">
                    <button class=" btn btn-success text-white fs-6 font-semibold"
                        type="submit">{{ $car_type === 'edit' ? 'Edit' : 'Add' }}</button>
                    <a class="text-sm underline text-gray-700" href="/cars">Back to Student List</a>
                </div>
            </form>

        </div>
    @elseif ($car_type === 'show')
        <div class="flex flex-col justify-center items-left h-full w-fit py-10">
            <span class="">
                <label class="fs-4 fw-semibold" for="">Brand-Name :</label>
                <p class="fs-5 inline text-medium fw-light">
                    {{ $car->brand_name }}
                </p>
            </span>
            <span class="">
                <label class="fs-4 fw-semibold" for="">Year-Of-Purchase :</label>
                <p class="fs-5 inline text-medium fw-light">
                    {{ $car->yearOfPurchase }}
                </p>
            </span>
            <span class="">
                <label class="fs-4 fw-semibold" for="">Name-Plate :</label>
                <p class="fs-5 inline text-medium fw-light">
                    {{ $car->name_plate }}
                </p>
            </span>
            <div class="flex justify-between pt-4">
                <a class="text-right btn btn-info text-white" href={{ route('cars.edit', $car->id) }}>Edit</a>
                   <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
        </div>
        <a class="text-sm underline text-gray-700" href="/cars">Back to Student List</a>
    @else
        <h3>Something Went Wrong Its Not Working Please Refresh Page</h1>

    @endif


@endsection
