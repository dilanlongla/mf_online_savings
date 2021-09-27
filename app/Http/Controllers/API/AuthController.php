<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends ApiController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
    
    /**
     * Register client api
     *
     * @return \Illuminate\Http\Response
     */
    public function registerClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'nic' => 'required',
            'address' => 'required',
            'tel' => 'required|numeric',
            // 'password' => 'required',
            // 'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();
        $input['name'] = $input['first_name'] . ' ' . $input['last_name'];

        $user = User::create($input);
        $user->assignRole('client');
        $success['name'] =  $user->name;

        activity()
            ->causedBy(Auth()->user())
            ->log('New client registered successfully');
        return $this->sendResponse($success, 'New client registered successfully.');
    }

    /**
     * Register agent api
     *
     * @return \Illuminate\Http\Response
     */
    public function registerAgent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'nic' => 'required',
            'matricule' => 'required',
            'address' => 'required',
            'tel' => 'required|numeric',
            'email' => 'required|email',
            // 'password' => 'required',
            // 'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['name'] = $input['first_name'] . ' ' . $input['last_name'];
        $user = User::create($input);
        $user->assignRole('agent');
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        activity()
            ->causedBy(Auth()->user())
            ->log('New agent registered');
        return $this->sendResponse($success, 'New Agent registered successfully.');
    }

    /**
     * Register agent api
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate($id, Request $request)
    {
        $user = User::whereId($id);

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user->update($input);
        $success['name'] =  $user->name;

        activity()
            ->causedBy($user)
            ->log('Password updated successfully');
        return $this->sendResponse($success, 'User register successfully.');
    }


    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;

            activity()
                ->causedBy($user)
                ->log('User logged in successfully');
            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
