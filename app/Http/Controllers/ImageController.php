<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Image;
use App\space;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
		$images = Image::paginate(10);
        return view('image_upload.images-list')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('image_upload.add-new-image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	 
    public function store(Request $request)
    {
        //
		 $validation = Validator::make($request->all(), [
            'caption' => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile' => 'required|image|mimes:jpeg,png|min:1|max:250',
			
		]);
        // Check if it fails //
        if( $validation->fails() ){
        return redirect()->back()->withInput() ->with('errors', $validation->errors() );
		}
	
	
        $image = new Image;
		
		// upload the image //
        $file = $request->file('userfile');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);
		
		
		// save image data into database //
        $image->file = $destination_path . $filename;
        $image->caption = $request->input('caption');
		$image->type = $request->input('type');
		$image->rating = $request->input('rating');
		$image->open_hour = $request->input('open_hour');
		$image->quota = $request->input('quota');
		$image->price = $request->input('price');
		$image->location = $request->input('location');
		$image->facility = $request->input('facility');
		$image->email_owner = $request->input('email');
		$image->phone = $request->input('phone_number');
        $image->description = $request->input('description');
		$image->save();
	
		
        return redirect('/')->with('message','You just uploaded an image!');
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
		  $image = Image::findorfail($id);
        return view('image_upload.image-detail')->with('image', $image);

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
		$image = Image::find($id);
        return view('image_upload.editimage')->with('image', $image);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Validation //
        $validation = Validator::make($request->all(), [
        'caption' => 'required|regex:/^[A-Za-z ]+$/',
        'description' => 'required',
        'userfile' => 'sometimes|image|mimes:jpeg,png|min:1|max:250',
		'scaption' => 'required|regex:/^[A-Za-z ]+$/',
        'sdescription' => 'required',
        'suserfile' => 'required|image|mimes:jpeg,png|min:1|max:250',
        ]);
// Check if it fails //
        if( $validation->fails() ){
        return redirect()->back()->withInput()
			->with('errors', $validation->errors() );
}
// Process valid data & go to success page //
        $image = Image::find($id);
// if user choose a file, replace the old one //
        if( $request->hasFile('userfile') ){
			$file = $request->file('userfile');
			$destination_path = 'uploads/';
			$filename = str_random(6).'_'.$file->getClientOriginalName();
			$file->move($destination_path, $filename);
			$image->file = $destination_path . $filename;
        }
		$space = new space;
		$sfile = $request->file('suserfile');
        $sdestination_path = 'uploads/';
        $sfilename = str_random(6).'_'.$sfile->getClientOriginalName();
        $sfile->move($sdestination_path, $sfilename);
		
// replace old data with new data from the submitted form //
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();
		
		$space->id_company = $id;
		$space->file = $sdestination_path . $sfilename;
        $space->caption = $request->input('scaption');
        $space->description = $request->input('sdescription');
        $space->save();
        return redirect('/')->with('message','You just updated an image!');
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
		$image = Image::find($id);
        $image->delete();
        return redirect('/')->with('message','You just delete an image!');
    }
  }

