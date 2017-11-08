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
      	$login_id = Auth::user()->id;
   		$data['blog']=User::find($login_id);
        return view('admin.admin.profile',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['name'=>'Required','email' => 'required|email|unique:users']);

       if ($request->pass!='')
			{
				 $this->validate($request, [
			        'pass'     => 'required|min:6',
			        'cpass' => 'required|same:pass',
			    ]);

			   $change_password=bcrypt($request->pass);
			   if ($request->file('image')) {
	            $blog=User::find($id);

	            // Delete old image
	            File::delete("storage/app/public/$blog->image");
	            File::delete("storage/app/public/thumbnail/$blog->image");
	            $name= $request->image->hashName();
 
	            Storage::putFile('public',$request->file('image'));
	            $img = Image::make("storage/app/public/$name");
	            $img->resize(100, 100, function ($constraint) {
	                $constraint->aspectRatio();
	            })->save("storage/app/public/thumbnail/$name");
	            
	            $blogUpdate=$request->all();
	            $blogUpdate['image']=$name;
	            $blogUpdate['password']=$change_password;
	            $blog->update($blogUpdate);
	             return redirect('profile');
	        }
	        else
	        {
	            $blog=User::find($id);
	            $blogUpdate=$request->all();
	            $blogUpdate['image'] =$blog->image ;
	            $blogUpdate['password']=$change_password;
	            $blog->update($blogUpdate);
	            return redirect('profile');
	        }
			     
			}
			else
			{
				if ($request->file('image')) {
			            $blog=User::find($id);

			            // Delete old image
			            File::delete("storage/app/public/$blog->image");
			            File::delete("storage/app/public/thumbnail/$blog->image");
			            $name= $request->image->hashName();
			            Storage::putFile('public',$request->file('image'));
			            $img = Image::make("storage/app/public/$name");
			            $img->resize(100, 100, function ($constraint) {
			                $constraint->aspectRatio();
			            })->save("storage/app/public/thumbnail/$name");
			            
			            $blogUpdate=$request->all();
			            $blogUpdate['image']=$name;
			            $blog->update($blogUpdate);
			             return redirect('profile');
			        }
			        else
			        {
			            $blog=User::find($id);
			            $blogUpdate=$request->all();
			            $blogUpdate['image'] =$blog->image ;
			            
			            $blog->update($blogUpdate);
			            return redirect('profile');
			        }
			}
           
  		
    }
}
