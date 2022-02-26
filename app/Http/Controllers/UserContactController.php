<?php

namespace App\Http\Controllers;

use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class UserContactController extends Controller
{
    public $user;
    public $extra_title;
    public function __construct()
    {
        $this->extra_title = "- User Contact";
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserContact $userContact,$slug)
    {
        if (is_null($this->user) ||  !$this->user->can('user.contact.create')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['extra_title'] = $this->extra_title;
        $data['lists']=User::where('slug',$slug)->first();
        $data['slug'] = $slug;
        return view ('admin.shipper.contact.create',$data)->with('data',$userContact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug)
    {
        if (is_null($this->user) ||  !$this->user->can('user.contact.store')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $request->validate([
            'contact' => 'required|max:255',
            'email' => 'required|unique:user_contacts',
            'phone' => 'required|unique:user_contacts',
            'mobile' => 'required|unique:user_contacts',
            'address' => 'required',
            'fax' => 'required|unique:user_contacts',
        ]);

        $SContact = UserContact::create([
                'contact'=>$request->get('contact'),
                'email'=>$request->get('email'),
                'phone'=>$request->get('phone'),
                'mobile'=>$request->get('mobile'),
                'address'=>$request->get('address'),
                'user_id'=>$request->get('user_id'),
                'fax'=>$request->get('fax'),
                $str1 = $this->RemoveSpecialChar('email'),
                'slug'  => Str::slug($request->$str1),
            ]
        );
        if(empty($SContact)){
            return redirect()->back()
                ->withInput()
                ->with("errors_message", __('Failed to insert'));
        }
        return redirect()->route("shipper.show",$slug)
            ->with("success_message", __("Data inserted successfully"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserContact  $userContact
     * @return \Illuminate\Http\Response
     */
    public function edit(UserContact $userContact,$slug)
    {
        if (is_null($this->user) ||  !$this->user->can('user.contact.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['extra_title'] = $this->extra_title;
        $data['lists']=UserContact::where('slug',$slug)->first();
        $data['slug'] = $slug;
        return view ('admin.shipper.contact.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserContact  $userContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        if (is_null($this->user) ||  !$this->user->can('user.contact.update')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $slug = User::where('id',$request->user_id)->first();
        $data = UserContact::where("id",$request->id)->first();
        $data->update([
            $data->contact=$request->contact,
            $data->email=$request->email,
            $data->phone=$request->phone,
            $data->mobile=$request->mobile,
            $data->address=$request->address,
            $data->fax=$request->fax,
        ]);
        
        return redirect()->route('shipper.show',$slug->slug)->with('success_message','Successfully shipper updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserContact  $userContact
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (is_null($this->user) ||  !$this->user->can('user.contact.destroy')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data= UserContact::where("slug",$slug)->first();
        $data->delete();
        return redirect()->back();
    }

    function RemoveSpecialChar($str) {
        $res = str_replace( array( '\'', '"','.','@',
            ',' , ';', '<', '>' ), ' ', $str);

        // Returning the result
        return $res;
    }
}
