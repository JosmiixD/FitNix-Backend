@csrf
<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
    <h5 class="text-dark font-weight-bold mb-10">Datos de la rutina:</h5>
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">Nombre de la rutina</label>
        <div class="col-lg-4 col-xl-4">
            <input class="form-control form-control-solid form-control-lg" name="name" type="text" value="" placeholder="Ejemplo: Piernas" />
        </div>
        <label class="col-xl-1 col-lg-1 col-form-label">Dia</label>
        <div class="col-lg-4 col-xl-4">
            <select name="day" class="form-control form-control-lg form-control-solid">
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miercoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">Sabado</option>
                <option value="7">Domingo</option>
            </select>
        </div>
    </div>
    <!--end::Group-->
    <!--begin::Group-->
    <div class="form-group row">
        <label class="col-xl-8 col-lg-8 font-weight-bold col-form-label">Ejercicios:</label>
        <div class="col-lg-4 col-xl-4">
            <button type="button" class="btn btn-light-success mb-10" id="add_workout">
                Agregar ejercicio
                <span class="svg-icon svg-icon-light-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
            </button>
        </div>
    </div>
    <!--end::Group-->
    <div id="exercises_list">
        <div class="form-group row">
            <div class="col-lg-5 col-xl-5">
                <input class="form-control form-control-solid form-control-lg" name="exercise_name_1" type="text" value="" placeholder="Nombre" />
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_sets_1" type="number" value="" placeholder="Sets"/>
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_reps_1" type="number" value="" placeholder="Reps"/>
            </div>
            <div class="col-lg-3 col-xl-3">
                <input class="form-control form-control-solid form-control-lg" name="exercise_weight_1" type="number" value="" placeholder="Peso"/>
            </div>
        </div>
    </div>
    <div id="exercises_list">
        <div class="form-group row">
            <div class="col-lg-5 col-xl-5">
                <input class="form-control form-control-solid form-control-lg" name="exercise_name_2" type="text" value="" placeholder="Nombre" />
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_sets_2" type="number" value="" placeholder="Sets"/>
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_reps_2" type="number" value="" placeholder="Reps"/>
            </div>
            <div class="col-lg-3 col-xl-3">
                <input class="form-control form-control-solid form-control-lg" name="exercise_weight_2" type="number" value="" placeholder="Peso"/>
            </div>
        </div>
    </div>
    <div id="exercises_list">
        <div class="form-group row">
            <div class="col-lg-5 col-xl-5">
                <input class="form-control form-control-solid form-control-lg" name="exercise_name_3" type="text" value="" placeholder="Nombre" />
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_sets_3" type="number" value="" placeholder="Sets"/>
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_reps_3" type="number" value="" placeholder="Reps"/>
            </div>
            <div class="col-lg-3 col-xl-3">
                <input class="form-control form-control-solid form-control-lg" name="exercise_weight_3" type="number" value="" placeholder="Peso"/>
            </div>
        </div>
    </div>
    <div id="exercises_list">
        <div class="form-group row">
            <div class="col-lg-5 col-xl-5">
                <input class="form-control form-control-solid form-control-lg" name="exercise_name_4" type="text" value="" placeholder="Nombre" />
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_sets_4" type="number" value="" placeholder="Sets"/>
            </div>
            <div class="col-lg-2 col-xl-2">
                <input class="form-control form-control-solid form-control-lg" name="exercise_reps_4" type="number" value="" placeholder="Reps"/>
            </div>
            <div class="col-lg-3 col-xl-3">
                <input class="form-control form-control-solid form-control-lg" name="exercise_weight_4" type="number" value="" placeholder="Peso"/>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-8 ml-lg-auto">
            <button type="submit" id="submit_form" class="btn btn-primary mr-2 mt-ladda-btn ladda-button" data-style="zoom-out">{{  $btnText  }}<span class="ladda-label"></span></button>
            <a href="#"  class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</div>