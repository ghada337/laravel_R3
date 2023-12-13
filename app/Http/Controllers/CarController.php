<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**@this for the second method */
    private $columns = ['title', 'description', 'published'];
/**@end of the second method */

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
        //return dd ($request->request);
        // $car = new Car();
        // $car->title = "BMW";
        // $car->description = "BMW description";
        // $car->published= 1;
        // $car->save();
        // return 'Data added successfully';i

            /*@first method */
    //     $cars = new Car();
    //     $cars->title = $request->title;
    //     $cars->description = $request-> description;
    //     if(isset($request->published)){
    //         $cars->published = 1;
    //     }else{
    //     $cars->published= 0;
    //     }
    //     $cars->save();
    //     return 'Data added successfully';
            /*end of first method */

            /* @ second method */
            $data = $request->only($this->columns);
            $data['published'] = isset($request->published);
            //the only line below is  to add the data to the model then  my database
            Car::create($data);
            return redirect('cars');
           /*end of second method */
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   /**@this the from second method to find the id and show it in the showCar.blade.php */
        $car = Car::findOrFail($id);
        return view('showCar', compact('car'));
        /*@end of the second method*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // @day 5' for the updateCar.blade.php
        $car = Car::findOrFail($id);
        return view('updateCar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($request->published);
        Car::where('id', $id)->update($data);
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
