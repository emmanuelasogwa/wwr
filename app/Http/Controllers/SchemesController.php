<?php

namespace App\Http\Controllers;

use App\Scheme;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;

class SchemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the referral schemes
        $schemes = Scheme::all();
        //load the view and pass the schemes
        return view('schemes.index')
        ->with('schemes', $schemes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['modify'] = 0;
        return view('schemes/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // input validation
        $rules = array(
            'title'       => 'required|min:12',
            'link'      => 'required',
            'creator' => 'required|min:6 ',
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the form
        // process the form
        if ($validator->fails()) {
            return Redirect::to('schemes/create')
                ->withErrors($validator)
                ->withInput();
        } else {
        $scheme = new Scheme;
        $scheme->title       = Input::get('title');
        $scheme->link      = Input::get('link');
        $scheme->description = Input::get('description');
        $scheme->creator   = Input::get('creator');
        $scheme->referer_reward = Input::get('referer_reward');
        $scheme->invitee_reward = Input::get('invitee_reward');

            //Process uploaded image
            if($request->hasFile('image'))
            {
                $image_file = $request->file('image');
                $image_file_name =  time().'.'.$image_file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image_file->move($destinationPath, $image_file_name);

            }
        $scheme->image_link = $destinationPath.'/'.$image_file_name;
        $scheme->save();




        // redirect
        $message ='You have successfully posted a referral scheme!';
        return Redirect::to('schemes/create')->with('message',$message);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $scheme = Scheme::findOrFail($id);

        return view('schemes.show')->withScheme($scheme);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = [];
        $data['modify'] = 1;
        $data['id'] = $id;
        $scheme = Scheme::findOrFail($id);
        $data['title'] = $scheme->title;
        $data['link']= $scheme->link;
        $data['description'] = $scheme->description;
        $data['creator'] = $scheme->creator;
        $data['referer_reward'] = $scheme->referer_reward;
        $data['invitee_reward'] = $scheme->invitee_reward;
        return view('schemes.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $data = [];
        $data['modify'] = 1;
        $data['id'] = $id;
        // input validation
        $rules = array(
            'title'       => 'required|min:12',
            'link'      => 'required',
            'creator' => 'required|min:6'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the form
        if ($validator->fails()) {
            return Redirect::to('schemes/create',$data)
                ->withErrors($validator)
                ->withInput();
        } else {
            $scheme = Scheme::find($id);
            $scheme->title       = Input::get('title');
            $scheme->link      = Input::get('link');
            $scheme->description = Input::get('description');
            $scheme->creator   = Input::get('creator');
            $scheme->referer_reward = Input::get('referer_reward');
            $scheme->invitee_reward = Input::get('invitee_reward');

            //Process uploaded image
            if($request->hasFile('image'))
            {
                $image_file = $request->file('image');
                $image_file_name =  time().'.'.$image_file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image_file->move($destinationPath, $image_file_name);

            }
//            $scheme->image_link = $destinationPath.'/'.$image_file_name;
            $scheme->save();




            // redirect
            $data['message'] ='You have successfully updated the referral scheme!';
            return view('schemes.show')->withScheme($scheme);
        }
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
