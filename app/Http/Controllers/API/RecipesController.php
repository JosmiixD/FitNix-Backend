<?php

namespace App\Http\Controllers\API;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
    

    public function recipes( $id ) {

        try {
            
            $recipes = Recipe::where('category_id', $id )->where('status', 1 )->get();
            $recipes->makeHidden(['updated_at', 'status', 'user', 'category']);

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
