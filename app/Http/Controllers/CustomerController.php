<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = Customer::paginate(5);
        return view('customers.CustomerList', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customers.Customer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::beginTransaction();
        try {
            $user = new User();
    
            $user->name = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = 'Customer';
    
            $status = $user->save();
    
            if($status){
                if ($request->hasFile('profile_image')) {
                    $file = $request->file('profile_image');
                    $filename = $file->getClientOriginalName();
                    $file_path = config('app.global_variables.CustomerProfilePath');
                    $file_path = "uploades/profile_image/";
                    $profile_image_status = $file->move($file_path, $filename);
                } else {
                    $filename = ''; 
                }
                
                $customer = customer::create([
                    'user_id' => $user->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name ?? '',
                    'mobile_number' => $request->mobile_number,
                    'email' => $request->email,
                    'profile_image' => $filename,
                ]);
                DB::commit();
                request()->session()->flash('success', 'Customer Successfully Added');
                // dd($request->all() ,$customer ,$profile_image_status , $user->id);
            }else{
                request()->session()->flash('error', 'Somthing went wrong');
            }
        } catch (\Throwable $th) {
            echo $th;
        }

        return view('customers.Customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer , $id)
    {
        //
       
        $customer = customer::find($id);
        return view('customers.CustomerEdit', compact('customer'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user_id,],
        ]);

        DB::beginTransaction();
        try {
    
            $customer = customer::find($id); 
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name ?? '';
            $customer->mobile_number = $request->mobile_number;
            $customer->email = $request->email;
            $status = $customer->update();
    
            if($status){
                $user = User::find($request->user_id);
                $user->name = $request->first_name.' '.$request->last_name;
                $user->email = $request->email;
                $update_status = $user->update();
                DB::commit();
                request()->session()->flash('success', 'Customer Successfully Updated');
                // dd($request->all() ,$customer ,$profile_image_status , $user->id);
            }else{
                DB::rollBack();
                request()->session()->flash('error', 'Somthing went wrong');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th;
        }
        return redirect()->route('EditCustomer' , [$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer , $user_id)
    {
        //
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'Customer not found.');
        }
        // Delete the user
        $user->delete();

        return redirect()->route('CustomerList')->with('success', 'customer deleted successfully.');
    }


    /**
     * Change Password form view
     */
    public function ChangePasswordFoem(){
        return view('profile.ChangePasswordForm');
     }
}
