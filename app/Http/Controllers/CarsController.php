<?php

namespace App\Http\Controllers;

use App\Repositories\CarRepository;
use App\Entities\Car;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;

/**
 * Class CarsController
 * @package App\Http\Controllers
 */
class CarsController extends Controller
{
    /**
     * @var CarRepository
     */
    private $carRepository;

    /**
     * CarsController constructor.
     *
     * @param CarRepository $carRepository
     */
    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->carRepository->getAll()->map(function (Car $car) {
            return [
                'id' => $car->getId(),
                'model' => $car->getModel(),
                'color' => $car->getColor(),
                'price' => $car->getPrice()
            ];
        });

        return view('cars.index')->withCars($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCarRequest $request
     * @return mixed
     */
    public function store(StoreCarRequest $request)
    {
        $result = $request->all();

        $this->carRepository->store(new Car($result));

        $cars = $this->carRepository->getAll()->toArray();

        return view("cars.index")->withCars($cars);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (empty($car = $this->carRepository->getById($id))) {
            return abort(404);
        }

        return view('cars.show')->withCar($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (empty($car = $this->carRepository->getById($id))) {
            return abort(404);
        }

        return view('cars.edit')->withCar($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCarRequest $request
     * @param $id
     */
    public function update(StoreCarRequest $request, $id)
    {
        if (empty($carArray = $this->carRepository->getById($id)->toArray())) {
            return abort(404);
        }

        $requestArray = $request->toArray();
        foreach ($requestArray as $key => $value) {
            $carArray[$key] = $value;
        }

        $this->carRepository->update(new Car($carArray));
        $car = $this->carRepository->getById($id);

        return view('cars.show')->withCar($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
