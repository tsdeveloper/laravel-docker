<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Car;
use Illuminate\Http\Request;
use Exception;

class CarsController extends Controller
{

    /**
     * Display a listing of the cars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $cars = Car::paginate(25);

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new car.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('cars.create');
    }

    /**
     * Store a new car in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Car::create($data);

                $details['email'] = 'hijex57756@hubopss.com';
  
                dispatch(new SendEmailJob($details));

            return redirect()->route('cars.car.index')
                ->with('success_message', 'Car was successfully added.');
        } catch (Exception $exception) {
                dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }


    }

    /**
     * Display the specified car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        

        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified car in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $car = Car::findOrFail($id);
            $car->update($data);

            return redirect()->route('cars.car.index')
                ->with('success_message', 'Car was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified car from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $car = Car::findOrFail($id);
            $car->delete();

            return redirect()->route('cars.car.index')
                ->with('success_message', 'Car was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'string|min:1|max:255|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'is_active' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
