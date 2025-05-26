@extends('layout')

@section('content')
    <h1 class="mb-4">Lista de CEPs</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ceps as $cep)
                <tr>
                    <td>{{ $cep->cep }}</td>
                    <td>{{ $cep->logradouro }}</td>
                    <td>{{ $cep->bairro }}</td>
                    <td>{{ $cep->cidade }}</td>
                    <td>{{ $cep->estado }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum CEP cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection