<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.recipes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)[];
        $data->categories = Category::all();
        $data->recipe = new Recipe;
        return view( 'pages.recipes.create', compact('data') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


        // if recipe has image picture
        if ($request->hasFile('recipe_image')) {

            try {
                
                $fields = $request->validate([
                    'name'              => 'required|string',
                    'time_to_prepare'   => 'string',
                    'ingredients'       => 'required',
                    'instructions'      => 'required',
                ]);

                $recipe = Recipe::create([
                    'name'                  => $request['name'],
                    'time_to_prepare'       => $request['time_to_prepare'],
                    'level'                 => $request['level'],
                    'calories'              => $request['calories'],
                    'category_id'           => $request['category'],
                    'ingredients'           => $request['ingredients'],
                    'instructions'          => $request['instructions'],
                    'video_url'             => $request['video_url'],
                    'user_id'               => Auth::user()->id,
                ]);

                $date           = Carbon::now();
                $targets        = array(' ', ':');
                $date           = str_replace($targets, '-', $date);
                $recipeName     = str_replace($targets, '-', $request->name);
                $image          = $request->file('recipe_image');
                $fileName       = 'Recipe-img-' . $recipeName . '-' . $date . '.' . $image->getClientOriginalExtension();
                $img            = Image::make($image->getRealPath());

                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->stream(); // <-- Key point
                $upload_image = Storage::disk('local')->put('public/recipe-imgs/'.$fileName, $img, 'public');

                $update_image = $recipe->update([
                    'image_url'   => 'storage/recipe-imgs/' . $fileName
                ]);

                return redirect()->back()->with([
                    'type'     => 'success',
                    'message'  => 'Receta guardada con exito'
                ]);
                
            } catch (\Throwable $th) {
                return redirect()->back()->with([
                    'type'     => 'error',
                    'message'  => 'Ocurrio un error durante el proceso \nError: ' . $th->getMessage(),
                ]);
            }

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
        //
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

    public function getRecipes() {

        $sortData    = 'asc';
        $fieldToSort = 'id';
        $nameSearch  = request()->query('query') ? request()->query('query')['searchName'] : '';
        
        if(!is_null(request()->query('sort'))){
            $sortData    = request()->query('sort')['sort'];
            $fieldToSort = request()->query('sort')['field'];
        }
        
        return Recipe::GetRecipes($nameSearch,$sortData,$fieldToSort);

    }
}
