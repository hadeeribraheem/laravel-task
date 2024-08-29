<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use function Laravel\Prompts\password;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        // Check if the request contains 'name' input
        if ($request->has('name') && $request->input('name') !== '') {
            // Get the name input and filter users using 'like' query
            $name = $request->input('name');
            $users = User::where('name', 'like', "%{$name}%")->get();
        } else {
            // If no name filter is provided, retrieve all users
            $users = User::all();
        }

        // Return the users data to the 'users.index' view
        return view('users', compact('users'));
    }

    public function insertUser()
    {
        $users = [
            [
                'name' => 'fatima',
                'email' => 'fatima@support.com',
                'password' => bcrypt('support123'),
                'phone' => '01122334455',
                'type' => 'support',
            ],
            [
                'name' => 'khaled',
                'email' => 'khaled@support.com',
                'password' => bcrypt('support123'),
                'phone' => '01122334455',
                'type' => 'client',
            ],
            [
                'name' => 'sara',
                'email' => 'sara@support.com',
                'password' => bcrypt('support123'),
                'phone' => '01122334455',
                'type' => 'client',
            ],
            [
                'name' => 'abdullah',
                'email' => 'abdullah@support.com',
                'password' => bcrypt('support123'),
                'phone' => '01122334455',
                'type' => 'client',
            ],
            [
                'name' => 'mona',
                'email' => 'mona@support.com',
                'password' => bcrypt('support123'),
                'phone' => '01122334455',
                'type' => 'client',
            ]

        ];

        // Iterate over each user and insert if not found
        foreach ($users as $user) {
            $found = User::where('email', $user['email'])->exists();
            if (!$found) {
                User::query()->create($user);
            }
        }
        return 'Users inserted successfully!';
    }
    public function profile($id){
        $user = User::query()->find($id);
        if($user){
            $user->update(
                [
                    'name' => 'shereen',
                ]
            );
        }
    }
}
/*       $data = User::query();
        if(request()->filled('name')){
            $data->where('name', 'like', '%'.request('name').'%');
        }
        $result = $data
            ->orderBy('id', 'desc')
            ->get();
        return view('about', compact('result'));
    }
   /* public function index(){
         $data = request()->all();
         if(request()->filled('name')){
             $data = User::query()
                 ->where('name', 'like', "%".$data['name']."%")
                 ->orderBy('id', 'desc')
                 ->get();
             return $data;
         }
         else{
             echo 'no data';
         }
        /*
         User::query()->create(
           [
               'name' => 'ali',
               'email' => 'ali@gmail.com',
               'password' => bcrypt('ali'),
               'phone'=>'0111232421',
               'type'=>'client',
           ]
         );

    }*/


/*
 *
 *  $data = User::query()->with('questions');

        if(request()->filled('username')){
            $data->where('username', 'like', '%'.request('username').'%');
        }
 */
