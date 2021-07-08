<?php

namespace App\Http\Controllers\API;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    

    public function recipes( $id ) {

        try {

            $recipes = Recipe::where('category_id', $id)
                ->where('status', 1)
                ->limit(10)
                ->get();
            
            // $paginated = Recipe::where('category_id', $id )
            //             ->where('status', 1 )
            //             ->paginate(1);

            // $recipes = $paginated->getCollection();            

            foreach ($recipes as $recipe ) {
                if( !$recipe->isLikedByUser()->isEmpty() ) {

                    $recipe->isLikedByUser = true;

                }else {

                    $recipe->isLikedByUser = false;

                }

                $recipe->creatorName    = $recipe->user->name;

            }
            
            $recipes->makeHidden(['updated_at', 'status', 'user', 'category', 'recipeLike']);

            if( count( $recipes ) ) {
                return response()->json([
                    'ok'            => true,
                    'message'       => 'Recetas encontradas',
                    'recipes'       => $recipes
                ]);
            }else {
                return response()->json([
                    'ok'            => true,
                    'message'       => 'Lo sentimos, aun no hay recetas para esta categoria, comparte una receta propia a toda la comunidad FitNix',
                    'recipes'       => []
                ]);
            }

        } catch (\Throwable $th) {
            
            return response()->json([
                'ok'        => false,
                'message'   => $th->getMessage(),
            ], 401);
            
        }

    }





    public function categories() {

        try {
            
            $categories = Category::all();
            $categories->makeHidden(['updated_at']);

            if( count( $categories ) ) {
                
                return response()->json([
                    'ok'            => true,
                    'message'       => 'Categorias encontradas',
                    'categories'    => $categories
                ]);

            }else {
                return response()->json([
                    'ok'            => true,
                    'message'       => 'Sin categorias encontradas',
                    'categories'    => []
                ]);
            }

        } catch (\Throwable $th) {
            
            return response()->json([
                'ok'        => false,
                'message'   => $th->getMessage(),
            ], 401);
            
        }

    }

}
