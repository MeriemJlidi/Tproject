<?php

namespace App\Http\Controllers;
use App\weblink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class linkmanagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = weblink::latest()->paginate(5);
        return view('index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'link'    =>  'required',
            'title'     =>  'required',
            'img'         =>  'required|max:2048',
            'dept'    =>  'required'
        ]);

        $image = $request->file('img');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);


        $selecteddept = $request->input('dept');

        $form_data = array(
            'link'       =>   $request->link,
            'header'        =>   $request->title,
            'icon'            =>   $new_name,
            'departement'=>   $selecteddept
        );

        weblink::create($form_data);

        return redirect('links')->with('success', 'Data Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = weblink::findOrFail($id);
        return view('display', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = weblink::findOrFail($id);
        return view('edit', compact('data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'link'    =>  'required',
                'title'     =>  'required',
                'dept'     =>  'required',
                'img'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'link'    =>  'required',
                'title'     =>  'required',
                'dept'     =>  'required'
            ]);
        }

        $form_data = array(
            'link'       =>   $request->link,
            'header'        =>   $request->title,
            'departement'     =>  $request->dept,
            'icon'            =>   $image_name
        );

        weblink::whereId($id)->update($form_data);

        return redirect('links')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = weblink::findOrFail($id);
        $data->delete();

        return redirect('links')->with('success', 'Data is successfully deleted');

    }


}
