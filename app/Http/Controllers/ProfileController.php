<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use File;
use Flash;
use Image;
use Illuminate\Http\Request;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile()
    {
      	$login_id = Auth::User()->id;
   	$data['user'] = User::find($login_id);
        return view('admin.admin.profile',$data);
    }

    public function update(Request $request, $id)
    {
        // Validate User data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|nullable|max:1999'
        ], [
            'name.required' => 'Name Field is Required.',
            'email.required' => 'Email Field is Required.'
        ]);

        if($request->pass!='')
        {
            $this->validate($request, [
                'pass'     => 'required|min:6',
                'cpass' => 'required|same:pass',
            ]);

            $change_password = bcrypt($request->pass);
            if ($request->file('image')) {
                $user = User::find($id);

                // Delete old image
                File::delete("storage/app/public/$user->image");
                File::delete("storage/app/public/thumbnail/$user->image");
                $name= $request->image->hashName();

                Storage::putFile('public',$request->file('image'));
                $img = Image::make("storage/app/public/$name");
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("storage/app/public/thumbnail/$name");

                $userUpdate = $request->all();
                $userUpdate['image'] = $name;
                $userUpdate['password'] = $change_password;
                $user->update($userUpdate);
                
                $request->session()->flash('success', 'Profile has been Updated!');
                return redirect('admin/profile');
            }
            else
            {
                $user = User::find($id);
                $userUpdate = $request->all();
                $userUpdate['image'] = $user->image ;
                $userUpdate['password'] = $change_password;
                $user->update($userUpdate);
                
                $request->session()->flash('success', 'Profile has been Updated!');
                return redirect('admin/profile');
            }

        }
        else
        {
            if ($request->file('image')) {
                $user = User::find($id);

                // Delete old image
                File::delete("storage/app/public/$user->image");
                File::delete("storage/app/public/thumbnail/$user->image");
                $name= $request->image->hashName();
                Storage::putFile('public',$request->file('image'));
                $img = Image::make("storage/app/public/$name");
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("storage/app/public/thumbnail/$name");

                $userUpdate=$request->all();
                $userUpdate['image']=$name;
                $user->update($userUpdate);
                
                $request->session()->flash('success', 'Profile has been Updated!');
                return redirect('admin/profile');
            }
            else
            {
                $user = User::find($id);
                $userUpdate = $request->all();
                $userUpdate['image'] = $user->image ;
                $user->update($userUpdate);
                
                $request->session()->flash('success', 'Profile has been Updated!');
                return redirect('admin/profile');
            }
        }  		
    }
}
