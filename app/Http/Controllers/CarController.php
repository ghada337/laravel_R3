<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }
    //@this is  from my search

    // public function index()
    // {
    //     $cars = Car::get();

    //     // Convert the 'published' attribute for each car
    //     $cars->transform(function ($car) {
    //         $car->published = $car->published ? 'Yes' : 'No';
    //         return $car;
    //     });

    //     return view('cars', compact('cars'));
    // }

    //@end of the search
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        return dd ($request->request);
        // $car = new Car();
        // $car->title = "BMW";
        // $car->description = "BMW description";
        // $car->published= 1;
        // $car->save();
        // return 'Data added successfully';
        $cars = new Car();
        $cars->title = $request->title;
        $cars->description = $request-> description;
        if(isset($request->published)){
            $cars->published = 1;
        }else{
        $cars->published= 0;
        }
        $cars->save();
        return 'Data added successfully';
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
