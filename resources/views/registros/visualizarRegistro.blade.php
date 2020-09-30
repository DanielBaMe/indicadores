<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Ver Registro</title>
</head>

<body>
    @extends('layouts.app')
    @section ('content')
    @php
    $id_usuario = auth()->id();
    @endphp
    <div class="container">
        <p>{{$denuncias->denuncias}}</p>
        <div class="row">
            <div class="col-6">
                <div>
                    <h1>Denuncias</h1>
                    <label for="denuncias">Numero de denuncias</label>
                    <span>{{$denuncias->denuncias}}</span>
                    </br>
                    <label for="querellas">Numero de querellas</label>
                    <span>{{$denuncias->querellas}}</span>
                    </br>
                    <label for="total">Total de registros</label>
                    <span>{{$denuncias->total}}</span>
                </div>
            </div>
            </br>
            <div class="col-6">
                <div>
                    <h1>Victimas u ofendidos</h1>
                    <label for="mujeres">Numero de victimas u ofendidos mujeres</label>
                    <span>{{$victimas->mujeres}}</span>
                    </br>
                    <label for="hombres">Numero de victimas u ofendidos hombres</label>
                    <span>{{$victimas->hombres}}</span>
                    </br>
                    <label for="otros">Otros tipos de victimas u ofendidos</label>
                    <span>{{$victimas->otros}}</span>
                    </br>
                    <label for="total">Total de registros</label>
                    <span>{{$victimas->total}}</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Numero de carpetas de investigacion iniciadas</h1>
                    <label for="flagancia">Con detenido en flagrancia</label>
                    <span>{{$carpetasD->detenido_flagancia}}</span>
                    </br>
                    <label for="sin_detenido">Sin detenido</label>
                    <span>{{$carpetasD->sin_detenidos}}</span>
                    </br>
                    <label for="total">Total de registros</label>
                    <span>{{$carpetasD->total}}</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Ordenes de aprehension o detencion</h1>
                    <label for="flagancia">Ordenes de aprehension solicitadas por imputado</label>
                    <span>{{$ordenes->imputados}}</span>
                    </br>
                    <label for="sin_detenido">Ordenesde aprehension ordenadas por el juez de control por imputado</label>
                    <span>{{$ordenes->juez_control}}</span>
                    </br>
                    <label for="total">Ordenes de aprehension cumplimentadas por la policia por imputado</label>
                    <span>{{$ordenes->ordenes_cumplidas}}</span>
                    </br>
                    <label for="sin_detenido">Ordenes de detencion por caso urgente emitidas por el ministerio publico por imputado</label>
                    <span>{{$ordenes->ordenes_urgentes}}</span>
                    </br>
                    <label for="total">Ordenes de detencion por caso urgente cumplimentadas por la policia por imputado</label>
                    <span>{{$ordenes->urgentes_cumplidas}}</span>
                    </br>
                    <label for="total">Total de registros</label>
                    <span>{{$ordenes->total}}</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Detenidos derivados de las cii</h1>
                    <label for="flagancia">Numero de detenidos en flagancia</label>
                    <span>{{$detenidos->flagancia}}</span>
                    </br>
                    <label for="sin_detenido">Numero de detenidos por orden de aprehension</label>
                    <span>{{$detenidos->orden_aprehension}}</span>
                    </br>
                    <label for="total">Numero de detenidos por caso urgente</label>
                    <span>{{$detenidos->caso_urgente}}</span>
                    </br>
                    <label for="total">Numero de detenidos por caso urgente</label>
                    <span>{{$detenidos->total}}</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Estatus de los procedimientos derivados de las cii</h1>
                    <label for="flagancia">Determinados en archivo temporal</label>
                    <span>{{$carpetasP->arch_temporal}}</span>
                    </br>
                    <label for="sin_detenido">Determinados como abstencion de investigar</label>
                    <span>{{$carpetasP->abstencion}}</span>
                    </br>
                    <label for="total">Determinados como no ejercicio de la accion penal</label>
                    <span>{{$carpetasP->no_ejercicio}}</span>
                    </br>
                    <label for="flagancia">Determinados por criterio de oportunidad</label>
                    <span>{{$carpetasP->criterio}}</span>
                    </br>
                    <label for="sin_detenido">Por incompetencia</label>
                    <span>{{$carpetasP->incompetencia}}</span>
                    </br>
                    <label for="total">Por acumulacion</label>
                    <span>{{$carpetasP->acumulacion}}</span>
                    </br>
                    <label for="flagancia">Por sobreisimiento</label>
                    <span>{{$carpetasP->sobreisimiento}}</span>
                    </br>
                    <label for="sin_detenido">Por otra causa que extinga la accion penal</label>
                    <span>{{$carpetasP->otra_causa}}</span>
                    </br>
                    <label for="total">Otra decision que establezca el codigo penal de la entidad federativa</label>
                    <span>{{$carpetasP->otra_decision}}</span>
                    </br>
                    <label for="flagancia">En tramite en la etapa de investigacion</label>
                    <span>{{$carpetasP->tramite_investigacion}}</span>
                    </br>
                    <label for="sin_detenido">Vinculados a proceso</label>
                    <span>{{$carpetasP->vinculados}}</span>
                    </br>
                    <h2 for="total">DERIVADOS A MECANISMOS ALTERNATIVOS</h2>
                    </br>
                    <label for="sin_detenido">En tramite en el OEMASC sin acuerdo reparatorio</label>
                    <span>{{$carpetasP->oemasc_sn_acuerdo}}</span>
                    </br>
                    <label for="sin_detenido">En tramite en el OEMASC con acuerdo reparatorio</label>
                    <span>{{$carpetasP->oemasc_cn_acuerdo}}</span>
                    </br>
                    <label for="sin_detenido">Resueltos en el OEMASC por mediacion</label>
                    <span>{{$carpetasP->resueltos_oemasc_mediacion}}</span>
                    </br>
                    <label for="sin_detenido">Resueltos en el OEMASC por conciliacion</label>
                    <span>{{$carpetasP->resueltos_oemasc_conciliacion}}</span>
                    </br>
                    <label for="sin_detenido">Resueltos en el OEMASC por acuerdo reparatorio por junta restaurativa</label>
                    <span>{{$carpetasP->resueltos_oemasc_acuerdo}}</span>
                    </br>
                    <label for="total">Total</label>
                    <span>{{$carpetasP->total}}</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Estatus de los procedimientos de las vinculaciones a proceso</h1>
                    <label for="flagancia">En tramite ante el juez de control</label>
                    <span>{{$procedimientos->tramite_juez}}</span>
                    </br>
                    <label for="sin_detenido">Determinado por criterio de oportunidad</label>
                    <span>{{$procedimientos->criterio_oportunidad}}</span>
                    </br>
                    <label for="total">En tramite por suspencion condicional</label>
                    <span>{{$procedimientos->tramite_suspencion}}</span>
                    </br>
                    <label for="flagancia">Cumplida la suspencion condicional del proceso</label>
                    <span>{{$procedimientos->cumplimiento_suspencion}}</span>
                    </br>
                    <label for="sin_detenido">Resueltos por otras causas de sobreisimiento</label>
                    <span>{{$procedimientos->resueltos_otros}}</span>
                    </br>
                    <label for="total">En tramite por procedimiento abreviado</label>
                    <span>{{$procedimientos->tramite_proces_abreviado}}</span>
                    </br>
                    <label for="flagancia">Resueltos por procedimiento abreviado</label>
                    <span>{{$procedimientos->resuelto_proces_abreviado}}</span>
                    </br>
                    <label for="sin_detenido">En tramite ante el tribunal de enjuiciamiento</label>
                    <span>{{$procedimientos->tramite_tribunal}}</span>
                    </br>
                    <label for="total">Resueltos por juicio oral</label>
                    <span>{{$procedimientos->resueltos_juicio_oral}}</span>
                    </br>
                    <h2 for="total">DERIVADOS A MECANISMOS ALTERNATIVOS</h2>
                    </br>
                    <label for="sin_detenido">En tramite en el OEMASC sin acuerdo reparatorio</label>
                    <span>{{$procedimientos->oemasc_sn_acuerdo}}</span>
                    </br>
                    <label for="sin_detenido">En tramite en el OEMASC con acuerdo reparatorio</label>
                    <span>{{$procedimientos->oemasc_cn_acuerdo}}</span>
                    </br>
                    <label for="sin_detenido">Resueltos en el OEMASC por mediacion</label>
                    <span>{{$procedimientos->resueltos_oemasc_mediacion}}</span>
                    </br>
                    <label for="sin_detenido">Resueltos en el OEMASC por conciliacion</label>
                    <span>{{$procedimientos->resueltos_oemasc_conciliacion}}</span>
                    </br>
                    <label for="sin_detenido">Resueltos en el OEMASC por acuerdo</label>
                    <span>{{$procedimientos->resueltos_oemasc_acuerdo}}</span>
                    </br>
                    <label for="total">Total</label>
                    <span>{{$procedimientos->total}}</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Imputados vinculados a proceso o en espera</h1>
                    <label for="flagancia">Imputados a los que se les impuso prision preventiva oficiosa</label>
                    <span>{{$vinculados->pris_prev_oficiosa}}</span>
                    </br>
                    <label for="sin_detenido">Imputados a los que se les puso prision preventiva no oficiosa</label>
                    <span>{{$vinculados->pris_prev_no_oficiosa}}</span>
                    </br>
                    <label for="total">Imputados a los que se les impuso otra medida cautelar</label>
                    <span>{{$vinculados->otra_medida}}</span>
                    </br>
                    <label for="total">Imputados a los que no se les impuso medida cautelar</label>
                    <span>{{$vinculados->sin_medida}}</span>
                    </br>
                    <label for="total">Total</label>
                    <span>{{$vinculados->total}}</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>Imputados con sentencia</h1>
                    <label for="flagancia">Imputados con sentencia condenatoria por procedimiento abreviado</label>
                    <span>{{$imputados->sent_conden}}</span>
                    </br>
                    <label for="sin_detenido">Imputados con sentencia absolutoria por procedimiento abreviado</label>
                    <span>{{$imputados->sent_absolut}}</span>
                    </br>
                    <label for="total">Imputados con sentencia condenatoria por juicio oral</label>
                    <span>{{$imputados->conden_oral}}</span>
                    </br>
                    <label for="total">Imputados con sentencia absolutoria por juicio oral</label>
                    <span>{{$imputados->absolut_oral}}</span>
                    </br>
                    <label for="total">Total</label>
                    <span>{{$imputados->total}}</span>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>