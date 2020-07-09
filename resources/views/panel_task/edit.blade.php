@extends('panel_task.panel')
@section('content')
    <section>
        <div class="card justify-content-center align-items-center minh-100">
            <div class="card-body text-center">
                <div class="card-title">Editar tarea</div>
                <div class="card-text">
                    <form method="POST" action="/edit" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" id="titulo" name="title" value="{{$edit_task[0]->title}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="description" id="descripcion" class="form-control" cols="30" rows="10">{!! $edit_task[0]->descripcion !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <select name="status" id="estatus" class="form-control">
                                @foreach($options as $key=>$option)
                                <option {{ \App\Http\Controllers\PanelController::isSelected($key,$edit_task[0]->status)?'selected="selected"' : '' }} value="{{$key}}">{{$option}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="idtask" value="{{$edit_task[0]->idtask}}">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                    <a href="{{ URL::previous() }}">
                        <button class="btn btn-primary" style="margin:5px 0;">Regresar</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection