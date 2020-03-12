<?php

namespace App\Http\Controllers;
use App\Http\Resources\LinkResource;
use App\Http\Resources\LinkResourceCollection;
use App\Weblink;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class linkmanagerController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Weblink::all();
        return view('index',['data'=>$data]);
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
            'dept'    =>  'required',
            'credentials' =>  'required'
        ]);

        $image = $request->file('img');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);


        $categories= implode(', ', $request->dept);

        $form_data = array(
            'link'       =>   $request->link,
            'header'        =>   $request->title,
            'departement'=>   $categories,
            'icon'            =>   $new_name,
            'credentials'  =>   $request->credentials
        );

        Weblink::create($form_data);

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
        $data = Weblink::findOrFail($id);
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
        $data = Weblink::findOrFail($id);
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
                'credentials'     =>  'required'
            ]);
        }

        $categories= implode(', ', $request->dept);

        $form_data = array(
            'link'       =>   $request->link,
            'header'        =>   $request->title,
            'departement'     =>  $categories,
            'icon'            =>   $image_name,
            'credentials'  =>   $request->credentials

        );

        Weblink::whereId($id)->update($form_data);

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
        $data = Weblink::findOrFail($id);
        $data->delete();

        return redirect('links')->with('success', 'Data is successfully deleted');

    }

    /**
     * @param weblink $weblink
     * @return LinkResource
     */

    public function showAPI (Weblink $weblink) : LinkResource
    {

        return new LinkResource($weblink);
    }

    /**
     * @param weblink $weblink
     * @return LinkResourceCollection
     */

    public function showAllAPI () : LinkResourceCollection
    {

        return new LinkResourceCollection(Weblink::paginate());
    }


    /**
     * @param Collection $filters
     * @return LinkResource
     */

    protected $allowedFilteringParameters = ['credentials'];

    protected function filter(Collection $filters) : LinkResource
    {



        $query = QueryBuilder::for(Weblink::class)
            ->allowedFilters(['credentials'])
            ->get();


        return new LinkResource ($query);

    }

}
