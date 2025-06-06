<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SuccessCarController;
use App\Models\Car;
use Illuminate\Http\Response;

class CarResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $car_title = "List Of Cars";
        $car_type = "index";
        $cars = Car::all();
       return view("car.cars", compact('car_title', 'cars','car_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req )
    {
        $car_title = "Add New One";
        $car_type = "add";
        return view("car.cars")->with(compact('car_title','car_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
      $req->validate([
        'brand_name' => 'required',
        'name_plate' => 'required',
        'yearOfPurchase' => 'required|digits:4',
    ]);

    Car::create([
        'brand_name' => $req->brand_name,
        'name_plate' => $req->name_plate,
        'yearOfPurchase' => $req->yearOfPurchase,
    ]);
      return redirect()->route('cars.index')->with('success', 'Car created successfully.'); 
    }

    public function show(int $id)
    {
        $car_title = "Showing Car Details";
        $car_type = "show";
        $car = Car::findOrFail($id);
        return view("car.cars", compact('car_title', 'car','car_type'));
    }

    public function edit(int $id)
    {
        $car_title = "Edit Details";
        $car_type = "edit";
        $car = Car::findOrFail($id);
        return view("car.cars", compact('car_title', 'car','car_type'));
    }

    public function update(Request $req, int $id)
    {
        $validationData = $req->validate([
            'brand_name' => 'required',
            'name_plate' => 'required',
            'yearOfPurchase' => 'required|digits:4',
            ]);

        $car = Car::findOrFail($id)->update($validationData);
        return redirect()->route('cars.show',$id) 
        ->with('success', 'Car details updated successfully.');
    }

    public function destroy(int $id)
    {
         
        Car::findOrFail($id)->delete();
       return redirect()
        ->route('cars.index') // Adjust this route to your route name
        ->with('success', 'Car details Delete successfully.');
    }
}   
