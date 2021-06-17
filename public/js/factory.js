"use strict";
// FACTORY
$("html, body").animate({ scrollTop: "0" }); 
$(window).on('load', function(){
    $("html, body").animate({ scrollTop: "0" }); 
    setTimeout(() => {
        $('.preloader-container').fadeOut();
    }, 1000);
})
const factoryFitNix = function(){
    let __ktDataTable = function(url_request,columns,params){
        // columns must be an array object
        var dataTable = $('.kt_datatable').KTDatatable({
            // datasource definition
            "data" : {
                "type"   : 'remote',
                "source" : {
                    "read" : {
                        "url"    : url_request,
                        "method" : 'GET',
                        "params" : params 
                    },
                },
                "pageSize"        : 10, // display 20 records per page
                "serverPaging"    : true,
                "serverFiltering" : true,
                "serverSorting"   : true,
                "saveState"       : false
            },
            // layout definition
            "layout" : {
                "scroll" : false, // enable/disable datatable scroll both horizontal and vertical when needed.
                "footer" : false, // display/hide footer
            },
            // column sorting
            "sortable"   : true,
            "pagination" : true,
            "search" : {
                "input"   : $('#kt_dataTable_search'),
                "delay"   : 400,
                "key"     : 'searchName'
            },
            "columns"   : columns,
            "translate" : {
                "records" : {
                    "processing" : 'Porfavor espere...',
                    "noRecords"  : 'Sin datos disponibles'
                },
                "toolbar" : {
                    "pagination" : {
                        "items" : {
                            "default" : {
                                "first"  : 'Primero',
                                "prev"   : 'Anterior',
                                "next"   : 'Siguiente',
                                "last"   : 'Último',
                                "more"   : 'Más páginas',
                                "input"  : 'Número de páginas',
                                "select" : 'Seleccione tamaño de página'
                            },
                            "info" : 'Mostrando {{start}} - {{end}} de {{total}} registros'
                        }
                    }
                }
            }
        });
        $('#kt_dataTable_search').on('input', function() {
			dataTable.search($(this).val().toLowerCase(), 'name');
		});
        return dataTable;
    }

    // FORMAT CASH VALUES
    let actionToFormatValueCash = function(){
        $(document).on('change','.formatCashValue', function(){
            // let value = String(String($(this).val()).replaceAll(".", "")).replaceAll(",", "");
			// let number = Number(value);
            // let numberFormat = number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            let number = Number($(this).val());
            let numberFormat;
            if(isNaN(number))
                numberFormat = 0.00;
            else 
                numberFormat = number.toFixed(2);
            $(this).val(numberFormat);
		});
    }
    let activateonlyNumberValues = function(){
        $(document).on('keypress','.onlyNumberValue', function(event){
            let codes = [46,48,49,50,51,52,53,54,55,56,57];// 46 = "." | 44 = ","
            if(!codes.includes(event.keyCode)) return false;
            // if ( isNaN( String.fromCharCode(event.keyCode) )) return false; // Only numeric values
        });
    }

    let activateOnlyPositiveInteger = function() {
        $(document).on('keypress','.onlyPositiveInteger', function(event){
            let codes = [48,49,50,51,52,53,54,55,56,57];
            if(!codes.includes(event.keyCode)) return false;
        });
    }

    let activateSelect2 = function(){
        $('.select2').select2({
            "placeholder" : 'Seleccione una opción',
            "width"       : 'resolve',
            "language"    : {
                "noResults": function(){
                    return "No hay registros";
                }
            }
        });
    }

    let activateTimePicker = function (){
        $('.time-picker').timepicker({
            minuteStep: 1,
            defaultTime: '08:00 AM',
            showSeconds: false,
            showMeridian: true,
            snapToStep: true
        });
    }

    // GET BY AJAX
    let _activateConexionAjax = function(url,type,data){
        return $.ajax({
            "url"         : url,
            "method"      : type,
            "type"        : type,
            "data"        : data,
            "dataType"    : 'json',
            "contentType" : false,
            "processData" : false,
            "cache"       : false,
            success       : function(response) {
                // response.addHeader("Access-Control-Allow-Methods", "GET, POST, PATCH, PUT, DELETE");
                console.log("Response from the factory => ",response);             
            },
            error : function(error){
                console.log(error);
            }
        });
    }

    let activateInputMasks = function () {
        $('.phoneFormat').inputmask("mask", {
            "mask" : "(999) 999-9999"
        })
        $('.bankFormat').inputmask("mask", {
            "mask" : "9999 9999 9999 9999 99"
        });
        $('.nss').inputmask("mask", {
            "mask" : "99999999999"
        });
        $('.tinyValueFormat').inputmask("mask", {
            "mask" : "99.99"
        });
        $('.tinyValueFormat2').inputmask("mask", {
            "mask" : "999.99"
        });
    }

    let activateDatePicker = function () {
        let fecha_actual = new Date();
        $('.datepickerSingle').daterangepicker({ //single DatePicker
            "locale": {
                // format: 'DD/MM/YYYY hh:mm A'
                "format"      : 'DD/MM/YYYY',
                "daysOfWeek"  : ["Dom","Lun","Mar","Mier","Jue","Vie","Sáb"],
                "monthNames"  : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                "cancelLabel" : 'Cancelar',
                "applyLabel"  : 'Aceptar fecha'
            },
            "autoUpdateInput"  : false, //disable default date
            "singleDatePicker" : true,
            "showDropdowns"    : true,
            // "minDate"          : fecha_actual,
            // "minYear"          : fecha_actual.getFullYear() - 1,
            "maxYear"          : fecha_actual.getFullYear() + 5,
            "opens"            : "left",
            "drops"            : "down"
        });
        $('.datepickerSingle').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
        });
    }

    let removeDiacriticalMarks = function(value){
        return value.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    let openModalByClass = function(){
        $(document).on('click','.openModal',function(){
            $(`#${$(this).data('modal')}`).modal('show');
        })
    }
    // DATA RETURN FACTORY
    return {
        // ACTIVATE GENERAL FUNCTIONS
        init: function() {
            //
            activateSelect2();
            activateTimePicker();
            activateonlyNumberValues();
            activateOnlyPositiveInteger();
            actionToFormatValueCash();
            activateInputMasks();
            activateDatePicker();
            openModalByClass();
        },
        "data": {
            // GENERAL DATA TO RETURN
        },
        "methods": {
            // ACTIVATE DATATABLE
            "activateDataTable" : function(url,columns,params = {}){
                return __ktDataTable(url,columns,params);
            },
            "processDataByAjax" : function(url,type,data = {}){
                return _activateConexionAjax(url,type,data);
            },
            "removeDiacriticalMarks" : function(value){
               return removeDiacriticalMarks(value);
            }
        }
    };
}();

// FACTORY INIT
$(document).ready(function() {
    factoryFitNix.init();
    console.log("LOG FROM THE FACTORY => ",factoryFitNix);
});