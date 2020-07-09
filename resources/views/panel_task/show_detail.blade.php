@extends('panel_task.panel')
@section('content')
    <section>
        <div class="card justify-content-center align-items-center">
            <div class="card-body text-center">
                <div class="card-title"><h1>{{$task[0]->title}}</h1></div>
                <div class="card-text">
                    {{$task[0]->status}}
                    <h5>{{\Carbon\Carbon::parse($task[0]->created_at)->format('d/m/Y')}}</h5>
                    @if($task[0]->status == 'abierta')
                        <span style="color:#2bff0f;">Abierta</span>
                    @elseif($task[0]->status == 'proceso')
                        <span style="color:#ffd238;">En proceso</span>
                    @else
                        <span style="color:red;">Cerrada</span>
                    @endif
                    <p class="text">{{$task[0]->descripcion}}</p>
                </div>
                <div class="d-inline-flex">
                    <a href="/panel">
                        <button class="btn btn-primary">Regresar</button>
                    </a>
                    <a href="/edit_task/{{$task[0]->idtask}}/edit">
                        <button type="button" class="btn btn-warning" style="text-decoration: none;">
                            <i class="fa fa-edit"></i>
                        </button>
                    </a>
                    <form action="/delete" method="POST">
                        @csrf
                        <input type="hidden" name="idtask" value="{{$task[0]->idtask}}">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection