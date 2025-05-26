@extends('layout')

@section('content')
    <h1 class="mb-4">Cadastrar CEP</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erro!</strong> Verifique os campos abaixo:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('ceps.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cep" class="form-label">CEP (somente números)</label>
            <input type="text" class="form-control" id="cep" name="cep" required maxlength="8">
        </div>

        <button type="submit" class="btn btn-primary">Buscar e Cadastrar</button>
        <a href="{{ route('ceps.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection
