@extends('panel_task.panel')
@section('content')
    <section>
        <div class="card justify-content-center align-items-center minh-100">
            <div class="card-body text-center">
                <div class="card-title">Crear tarea</div>
                <div class="card-text">
                    <form method="POST" action="/create" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" id="titulo" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="description" id="descripcion" class="form-control" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <select name="status" id="estatus" class="form-control">
                                <option value="abierta">Abierta</option>
                                <option value="proceso">En proceso</option>
                                <option value="cerrada">Cerrada</option>
                            </select>
                        </div>
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