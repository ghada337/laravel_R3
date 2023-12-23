<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Redirect;
use App\Traits\Common;


class CarController extends Controller
{
    use Common;
    /**@this for the second method */

    //private $columns = ['title', 'description', 'published'];
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
            //data = $request->only($this->columns);
            // @day 7
                $messages = $this->messages();
                //end day 7
            $data = $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ],$messages);

            $fileName = $this->uploadFile($request->image, 'assets/images');
                $data['image'] = $fileName;

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
        // $data = $request->only($this->columns);
        // $data['published'] = isset($request->published);
        // Car::where('id', $id)->update($data);
        // return redirect('cars');

    //@day 8

        $messages = $this->messages();
        $data = $request->validate([
             'title'=>'required|string|max:50',
             'description'=> 'required|string',
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/images');    
                $data['image'] = $fileName;
            }
            
            $data['published'] = isset($request->published);
            Car::where('id', $id)->update($data);
            return redirect('cars');
    }
    //end day 8

    //@task7
//     $messages = $this->messages();
//     $data = $request->validate([
//         'title' => 'required|string|max:50',
//         'description' => 'required|string',
//         'image' => 'sometimes|required|mimes:png,jpg,jpeg|max:2048', // 'sometimes' because the image might not change.
//     ],$messages);
//     $car = Car::where('id', $id)->firstOrFail();

//     // @that will handle the file upload if a new file is provided.
//     if ($request->hasFile('image')) {
//         $fileName = $this->uploadFile($request->image, 'assets/images');
//         $data['image'] = $fileName;
//     }
//     $data['published'] = isset($request->published);
//     $car->update($data);
//     return redirect('cars');
// }
        //@end of task 7



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }

    /** @anther method to delete the data with secure delete */
    // public function destroy(Request $request)
    // {
    //     $id = $request->id;
    //     Car::where('id', $id)->delete();
    //     return redirect('cars');
    // }


    //trash list
    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect('cars');
    }
    //day 7
    public function messages(){
        return[
            'title.required'=>'العنوان مطلوب',
            'title.string'=>'Should be string',
            'description.required'=> 'should be text',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ];
    }


}


