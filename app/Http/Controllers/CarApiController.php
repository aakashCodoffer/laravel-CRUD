<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all()->toArray();
        return response()->json($cars,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "brand_name"=>"required|max:255",
            "name_plate"=>"required",
            "yearOfPurchase"=>"required",
        ]);

        if($validate){
            $searchUserInput = Car::where("name_plate","=",$validate["name_plate"]);
                if(!$searchUserInput){
                    $newResult = Car::create($validate);
                    return response()->json($newResult,201);
                }else{
                    return response()->json("This Brand Car Name Plate Available in DB",400);
                }
        }else{

            return response()->json("Something Have Error Try Again",402);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car,200);
    }

    public function update(Request $request, string $id)
    {
         $validate = $request->validate([
            "brand_name"=>"required|max:255",
            "name_plate"=>"required",
            "yearOfPurchase"=>"required",
        ]);

        if($validate){
            $fetchResultValue = Car::findOrFail($id);
            if($fetchResultValue){
                $fetchResultValue->update(["brand_name","name_plate","yearOfPurchase"],$validate);
                return response()->json("Data Update Success",201);
            }else{
                return response()->json("Data Not Update UnSuccess",400);

            }
        }else{
            return response()->json("Something Have Error: ",400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fetchResultValue = Car::findOrFail($id);
            if($fetchResultValue){
                $fetchResultValue->delete();
                return response()->json("Data Deleted Success",201);
            }else{
                return response()->json("Data Not Delete UnSuccess",400);

            }
    }
}
