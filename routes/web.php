<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

Route::middleware(['web', 'auth'])->group(function () {

//department route start here.......................................

    Route::get('department', 'DepartmentController@index');
    Route::get('department/add-department', 'DepartmentController@add_department');
    Route::post('department/department-store', 'DepartmentController@departmentStore');
    Route::get('department/update-department', 'DepartmentController@updateDepartment');
    Route::post('department/{id}/update', 'DepartmentController@departmentStore');
    Route::get('department/delete-department', 'DepartmentController@deleteDepartment');

//Developed by Gazi Salah Uddin

//employer route start here.......................................

    Route::get('employee', 'EmployeeController@index');
    Route::get('employee/add-employee', 'EmployeeController@add_employee');
    Route::post('employee/employee-store', 'EmployeeController@employeeStore');
    Route::get('employee/update-employee', 'EmployeeController@updateEmployee');

    Route::post('employee/{id}/update', 'EmployeeController@employeeRestore');
    Route::get('employee/delete-employee', 'EmployeeController@deleteEmployee');

    Route::post('employee/{id}/update', 'EmployeeController@employeeStore');
    Route::get('employee/delete-employee', 'EmployeeController@deleteEmployee');


//vehicle category route start here.......................................

    Route::get('vehicle', 'VehicleController@index');
    Route::get('add-vehicle-type', 'VehicleController@addVehicleType');
    Route::post('vehicle/vehicle-type-store', 'VehicleController@vehicleStore');
    Route::get('inactine-vehicle/{id}', 'VehicleController@vehicleInactine');
    Route::get('actine-vehicle/{id}', 'VehicleController@vehicleActine');
    Route::get('vehicle/update-type-vehicle', 'VehicleController@updateVehicle');
    Route::post('vehicle/{id}/update-type-vehicle', 'VehicleController@vehicleStore');
    Route::get('vehicle/delele-vehicle', 'VehicleController@deleteVehicle');

//vehicle list route start here.......................................

    Route::get('add-vehicle', 'VehicleController@addVehicleList');
    Route::get('register-vehile', 'VehicleController@registerVehicleList');
    Route::post('vehicle/vehicle-store', 'VehicleController@vehicleLiStore');
    Route::get('vehicle/update-vehicle', 'VehicleController@vehicleLiUpdate');
    Route::post('vehicle/{id}/update', 'VehicleController@vehicleLiStore');
    Route::get('vehicle/delete-vehicle', 'VehicleController@vehicleLiDelect');

//location route start here....................................................
    Route::get('location', 'LocationController@index');
    Route::get('add-location', 'LocationController@addLocationFrom');
    Route::post('location/location-store', 'LocationController@locationStore');
    Route::get('location/edit-location', 'LocationController@locationEdit');
    Route::post('location/{id}/update', 'LocationController@locationStore');
    Route::get('location/delete-location', 'LocationController@locationDelete');

//rout table route stsrt here....................................................
    Route::get('route', 'RouteController@index');
    Route::get('add-route', 'RouteController@addRouteFrom');
    Route::post('route/route-store', 'RouteController@routeStore');
    Route::get('get-stoppage-data', 'RouteController@getStoppageData');
    Route::get('route/edit-route', 'RouteController@editRoute');
    Route::post('route/{id}/update', 'RouteController@routeStore');
    Route::get('route/delete-route', 'RouteController@deleteRoute');

// fitness route start here..........................................................
    Route::get('fitness', 'FitnessController@index');
    Route::get('add-fitness', 'FitnessController@addFitness');
    Route::post('fitness/fitness-store', 'FitnessController@storeFitness');
    Route::get('inactine-fitness/{id}', 'FitnessController@inactiveFitness');
    Route::get('actine-fitness/{id}', 'FitnessController@activeFitness');
    Route::get('fitness/update-fitness', 'FitnessController@updateFitness');
    Route::post('fitness/{id}/update', 'FitnessController@storeFitness');
    Route::get('fitness/delete-fitness', 'FitnessController@deleteFitness');


//driver table route stsrt here...........................................
    Route::get('driver', 'DriverController@index');
    Route::get('driver/add-driver', 'DriverController@add_driver');
    Route::post('driver/driver-store', 'DriverController@driverStore');
    Route::get('driver/update-driver', 'DriverController@updateDriver');
    Route::post('driver/{id}/update', 'DriverController@driverRestore');
    Route::get('driver/delete-driver', 'DriverController@deleteDriver');

    Route::get('assign_driver', 'AssigndriverController@index');
    Route::get('assign_driver/add-assign_driver', 'AssigndriverController@add_assign_driver');
    Route::post('assign_driver/assign_driver-store', 'AssigndriverController@assigndriverStore');
    Route::get('assign_driver/update-assign_driver', 'AssigndriverController@updateAssign_driver');
    Route::post('assign_driver/{id}/update', 'AssigndriverController@assindriverRestore');
    Route::get('assign_driver/delete-assign_driver', 'AssigndriverController@deleteAssigndriver');

    Route::get('vehicle_and_route', 'Vehicle_and_routeController@index');
    Route::get('vehicle_and_route/add-vehicle_and_route', 'Vehicle_and_routeController@add_vehicle_and_route');
    Route::post('vehicle_and_route/vehicle_and_route-store', 'Vehicle_and_routeController@vehicle_and_routeStore');
    Route::get('vehicle_and_route/update-vehicle_and_route', 'Vehicle_and_routeController@updateVehicle_and_route');
    Route::post('vehicle_and_route/{id}/update', 'Vehicle_and_routeController@vehicle_and_routeRestore');
    Route::get('vehicle_and_route/delete-vehicle_and_route', 'Vehicle_and_routeController@deleteVehicle_and_route');

    Route::get('seat_assign', 'Seat_assignController@index');
    Route::get('seat_assign/add-seat_assign', 'Seat_assignController@addSeatAssign');
    Route::post('get-vehicle-by-route', 'Seat_assignController@getVehicleByRoute');
    Route::post('get-seat-by-vehicle', 'Seat_assignController@getSeatByVehicle');
    Route::post('seat_assign/seat_assign-store', 'Seat_assignController@seatAssignStore');
    Route::get('seat_assign/update-seat_assign', 'Seat_assignController@updateSeatAssign');
    Route::post('seat_assign/{id}/update', 'Seat_assignController@seatAssignRestore');
    Route::get('seat_assign/delete-seat_assign', 'Seat_assignController@deleteSeatAssign');


    Route::get('private_vehicle', 'PrivateVehicleController@index');
    Route::get('private_vehicle/add-private-vehicle', 'PrivateVehicleController@add_private_vehicle');
    Route::post('private_vehicle/car-vehicle-store', 'PrivateVehicleController@car_vehicle_store');
    Route::get('private_vehicle/update-private_vehicle', 'PrivateVehicleController@updatePrivateVehicle');
    Route::post('private_vehicle/{id}/update', 'PrivateVehicleController@car_vehicle_restore');
    Route::get('private_vehicle/delete-private_vehicle', 'PrivateVehicleController@deletePrivateVehicle');

    Route::get('seat-allocation-report', 'SeatAllocationReportController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
