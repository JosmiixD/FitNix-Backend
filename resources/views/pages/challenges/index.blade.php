@extends('layouts.index')
@section('title','FitNix | Retos')
@section('superadmin-content')
@include('layouts.partials.global._subheader', [
    'sectionName'       => 'Retos',
    'subheaderText'     => 'Lista de retos',
    'buttonRouteName'   => 'challenges.create',
    'buttonText'        => 'Crear nuevo reto'

])
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Retos
                    <span class="d-block text-muted pt-2 font-size-sm">Lista de retos registradas en el sistema</span></h3>
                </div>
            </div>
            
            <div class="card-body">
                <div class="p-5">
                    <div class="col-md-4 my-2 my-md-0">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Buscar reto..." id="kt_dataTable_search" />
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="datatable datatable-bordered datatable-head-custom kt_datatable" id="challenges_datatable"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{  URL::asset ('js/sections/challenges/challenges.js?v='.rand())  }}"></script>
@endpush