@extends('layouts.index')
@section('superadmin-content')
@include('layouts.partials.global._subheader', [
    'sectionName'       => 'Recetas',
    'subheaderText'     => 'Creación de nueva receta',
    'buttonRouteName'   => 'recipes.index',
    'buttonText'        => 'Ir a las recetas'

])
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom card-stretch">
                <form class="form" action="{{  route('recipes.store')  }}" method="POST" enctype="multipart/form-data">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">
                                                @include('layouts.partials.recipes._recipe_form', ['btnText' => 'Guardar'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{  URL::asset ('js/sections/recipes/create.js?v='.rand())  }}"></script>
@endpush
