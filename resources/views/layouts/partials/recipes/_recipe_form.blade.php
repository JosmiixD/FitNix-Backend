@csrf
<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
    <h5 class="text-dark font-weight-bold mb-10">Datos de la receta:</h5>
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label text-left">Imagen</label>
        <div class="col-lg-9 col-xl-9">
            <div class="image-input image-input-outline" id="kt_user_add_avatar">
                <div class="image-input-wrapper" style="background-image: url(images/global/no-image.png); background-position: center; background-size: cover;"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Cambiar imagen">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="recipe_image" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="profile_avatar_remove" />
                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancelar imagen">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
            </div>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Nombre de la receta</label>
        <div class="col-lg-9 col-xl-9">
            <input class="form-control form-control-solid form-control-lg" name="name" type="text" value="" />
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Tiempo de preparación</label>
        <div class="col-lg-9 col-xl-9">
            <input class="form-control form-control-solid form-control-lg" name="time_to_prepare" type="text" value="" placeholder="25 min" />
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Calorias</label>
        <div class="col-lg-9 col-xl-9">
            <input class="form-control form-control-solid form-control-lg" name="calories" type="text" value="" placeholder="Kcal" />
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Categoria</label>
        <div class="col-lg-9 col-xl-9">
            <select name="category" class="form-control form-control-lg form-control-solid">
                @forelse( $data->categories as $category ) 
                    <option value="{{  $category->id  }}">{{  $category->name  }}</option>
                @empty
                    <option value="0">Sin categorias</option>
                @endforelse
            </select>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Nivel</label>
        <div class="col-lg-9 col-xl-9">
            <select name="level" class="form-control form-control-lg form-control-solid">
                <option value="1">Principiante</option>
                <option value="2">Intermedio</option>
                <option value="3">Avanzado</option>
            </select>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label" for="ingredients">Ingredientes <span class="text-danger">*</span></label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                {{-- <input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="5678967456" placeholder="Phone" /> --}}
                <textarea class="form-control form-control-solid form-control-lg" id="ingredients" name="ingredients" rows="3"></textarea>
            </div>
            <span class="form-text text-muted">Ingrese cada ingrediente por linea</span>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label" for="instructions">Instrucciones <span class="text-danger">*</span></label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                {{-- <input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="5678967456" placeholder="Phone" /> --}}
                <textarea class="form-control form-control-solid form-control-lg" id="instructions" name="instructions" rows="3"></textarea>
            </div>
            <span class="form-text text-muted">Ingrese cada instruccion por linea</span>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label" for="instructions">Link de video <span class="text-danger">*</span></label>
        <div class="col-lg-9 col-xl-9">
            <div class="input-group input-group-solid input-group-lg">
                <input class="form-control form-control-solid form-control-lg" name="video_url" type="url" value="" placeholder="https://www.youtube.com/watch?v=Welzh" />
            </div>
            <span class="form-text text-muted">Solo se permiten videos de Youtube</span>
        </div>
    </div>
    <!--end::Group-->
    <div class="row pt-5">
        <div class="col-8 ml-lg-auto">
            <button type="submit" id="submit_form" class="btn btn-primary mr-2 mt-ladda-btn ladda-button" data-style="zoom-out">{{  $btnText  }}<span class="ladda-label"></span></button>
            <a href="#"  class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</div>