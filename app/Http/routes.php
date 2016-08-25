<?php
use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function(){

	Route::get('/lara', function (Request $request){
		$tasks = Task::orderBy('created_at', 'asc')->get();
		return view('tasks', [
			'tasks' => $tasks
			]);
	});

	Route::post('/lara', function (Request $request){
		$validator = Validator::make($request->all(), [
	        'name' => 'required|max:255',
	        'end' => 'required|max:20'
	    ]);

	    if ($validator->fails()) {
	        return redirect('lara')
	            ->withInput()
	            ->withErrors($validator);
	    }

	    $task = new Task;
	    $task->name = $request->name;
	    $task->end = $request->end;
	    $task->save();

	    return redirect('/lara');
	});

	Route::delete('/lara/{task}', function (Task $task){
		$task->delete();

		return redirect('/lara');
	});

});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// main screen
Route::get('/', function () {
    return view('welcome');
});

// customers
Route::get('customer/{id}', function($id){
	$customer = App\Customer::find($id);
	echo $customer->name . '<br>';
	echo "Orders: " . '<br>';

	echo "<ul>";
	foreach ($customer->orders as $order) {
		echo "<li>" . $order->name . '</li>';
	}
	echo "<ul/>";
});
Route::get('customer_name/{name}', function($name){
	$data = App\Customer::where('name', '=', $name)->first();
	return view('customer_name', $data);
});

// orders

Route::get('orders', function(){
	$orders = App\Order::all();
	foreach ($orders as $order) {
		echo $order->name . ' Customer name: ' . $order->customer->name . '<br>';
	}
});

// test
Route::get('math/{a}+{b}', function($a, $b){
	echo $a + $b;
});

Route::get('test', function(){
	return view('test');
});

Route::post('test', function(){
	echo "POST";
});

Route::put('test', function(){
	echo "PUT";
});

