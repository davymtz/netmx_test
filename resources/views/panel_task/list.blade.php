@extends('panel_task.panel')
@section('content')
<section>
    <div class="dt-responsive table-responsive">
        <table class="table table-striped table-bordered nowrap">
            <thead>
            <th>Tarea</th>
            <th>Fecha creación</th>
            <th>Estado</th>
            </thead>
            <tbody>
            @if(count($tasks) > 0)
                @foreach($tasks as $task)
                    <tr id="num_col_{{ $task->idusuario }}">
                        <td><a href="/show/{{ $task->idtask }}">{{ $task->title }}</a></td>
                        <td>{{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y') }}</td>
                        <td>
                            @if($task->status == 'abierta')
                                Abierta
                            @elseif($task->status == 'proceso')
                                En proceso
                            @else
                                Cerrada
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" align="center">No hay informacion guardada</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</section>
@endsection