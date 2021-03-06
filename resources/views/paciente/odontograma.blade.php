@extends('layouts.menu')
@section('content')
<section class="we-offer-area section-gap" id="offer">
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr style="text-align: center">
                    @for($i = 1; $i <= 16; $i++)
                        <td>{{$i}}</td>
                    @endfor
                </tr>
                <tr>
                    @for($i = 1; $i <= 16; $i++)
                        <td>
                            <div class="diente" data-diente="diente{{$i}}" data-name="{{$dientes[$i-1]}}">
                                <div class="dent{{$i}}">
                                    <div class="trapecio-1"></div>
                                    <div class="trapecio-3"></div>
                                    <div class="cuadrado"></div>
                                    <div class="trapecio-4"></div>
                                    <div class="trapecio-2"></div>
                                    <div class="cross" style="background-color: transparent"></div>
                                    <div class="cross2" style="background-color: transparent"></div>
                                    <div class="puente" style="background-color: transparent"></div>
                                </div>
                            </div>
                        </td>
                    @endfor
                </tr>

                <tr>
                    @for($i = 17; $i <= 32; $i++)
                        <td>
                            <div class="diente" data-diente="diente{{$i}}" data-name="{{$dientes[$i-17]}}">
                                <div class="dent{{$i}}">
                                    <div class="trapecio-1"></div>
                                    <div class="trapecio-3"></div>
                                    <div class="cuadrado"></div>
                                    <div class="trapecio-4"></div>
                                    <div class="trapecio-2"></div>
                                    <div class="cross" style="background-color: transparent"></div>
                                    <div class="cross2" style="background-color: transparent"></div>
                                    <div class="puente" style="background-color: transparent"></div>
                                </div>
                            </div>
                        </td>
                    @endfor
                </tr>
                <tr style="text-align: center">
                    @for($i = 17; $i <= 32; $i++)
                        <td>{{$i}}</td>
                    @endfor
                </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h5>Leyenda</h5>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <div class="circulo" style="background: red"></div>
                                <div style="margin: -20px 0 0 25px;">Fractura</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="circulo" style="background: #17a2b8"></div>
                                <div style="margin: -20px 0 0 25px;">Restauración</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cruz"></div>
                                <div class="cruz2"></div>
                                <div style="margin: -20px 0 0 25px;">Extracción</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="puente" style="height: 20px; margin: -10px 0 0 5px;"></div>
                                <div style="margin: -20px 0 0 25px;">Puente</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title"><b id="name_diente"></b></div>
            </div>
            <div class="modal-body">
                <p id="info"></p>
            </div>
        </div>

    </div>
</div>
<script>
    var data = JSON.parse('<?php echo json_encode($odont); ?>');

    $('.diente').click(function() {
        var idc=($(this).data("diente"));
        var nombre=($(this).data("name"));
        $('#myModal').modal('show');
        $('#name_diente').text(nombre);
         var cont = modal_detalle(data[idc]);
        $('#info').html(cont);
    });

    function modal_detalle(data_dent) {
        var comas = data_dent.split(',');
        var ident;
        var cadena = '<div class="row">' +
            '<div class="col-lg-12"><div class="diente-m">\n' +
            '<div class="cruz" style="height: 40px;margin-left: 14px"></div>\n' +
            '<div class="cruz2" style="height: 40px;margin: -38px 0 0 13px"></div>\n' +
            '<div class="cuadrado" style="margin-top: -27px; background-color: white; position: absolute"></div>\n' +
            '<div class="num" style="margin: -42px 0 0 12px;">1</div>\n' +
            '<div class="num" style="margin: -12px 0 0 21px;">2</div>\n' +
            '<div class="num" style="margin: -24px 0 0 1px;">4</div>\n' +
            '<div class="num" style="margin: -13px 0 0 11px;">3</div>\n' +
            '<div class="num" style="margin: -33px 0 0 11px;position:absolute;">5</div>\n' +
            '</div><br>';
        cadena += '<ul>';
        for(i=0; i<comas.length; i++){
            var guion = comas[i].split('-');
            if(guion.length>1){
                var color;
                (guion[0]=='r') ? color = 'red' : color = '#17a2b8';
                cadena += '<li><div class="circulo" style="background: '+color+'"></div> ';
                (guion[1]=='1') ? ident = '6' : ident = '4';
                cadena += '<div style="margin: -19px 0 0 '+ident+'px; color: black;font-size: 11px" >'+guion[1]+'</div>';
                cadena += '<div style="margin: -20px 0 0 25px;">'+guion[2]+'</div></li>';
            }
            if(guion[0]=='x'){
                cadena += '<div class="cruz"></div>\n' +
                    '<div class="cruz2"></div>\n' +
                    '<div style="margin: -20px 0 0 25px;">Extracción</div>';
            }
            if(guion[0]=='p') {
                cadena += '<div class="puente" style="height: 20px; margin: 0 0 0 5px;"></div>\n' +
                    '<div style="margin: -20px 0 0 25px;">Puente</div>'
            }
        }
        cadena = cadena + '</ul></div></div>';
        return cadena;
    }

    function graficar_dent(data_dent,num) {
        var comas = data_dent.split(','); //primer dato
        for(i=0; i<comas.length; i++){
            var guion = comas[i].split('-');
            if(guion.length>1){
                var color;
                (guion[0]=='r') ? color = 'red' : color = '#17a2b8';

                if(guion[1]=='5')
                    $('.dent'+num+' .cuadrado').css('background-color',color);

                //console.log(guion);
                $('.dent'+num+' .trapecio-'+guion[1]).css('border-bottom-color',color);
            }
            if(guion[0]=='x'){
                $('.dent'+num+' .cross').css('background-color','black');
                $('.dent'+num+' .cross2').css('background-color','black');
            }
            if(guion[0]=='p'){
                $('.dent'+num+' .puente').css('background-color','red');
            }

        }
    }
    $(function() {
        var i;
        for(i=0; i<33; i++){
            var temp = 'diente'+(i+1).toString();
            if(data[temp]!=null){
                graficar_dent(data[temp],i+1);
            }
        }
    });
</script>
@endsection
