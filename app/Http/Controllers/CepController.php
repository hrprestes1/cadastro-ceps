<?php

namespace App\Http\Controllers;

use App\Models\Cep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function index()
    {
        $ceps = Cep::all();
        return view('ceps.index', compact('ceps'));
    }

    public function create()
    {
        return view('ceps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cep' => 'required|size:8'
        ]);

        $response = Http::get("https://viacep.com.br/ws/{$request->cep}/json/");

        if ($response->failed() || isset($response->json()['erro'])) {
            return back()->withErrors(['cep' => 'CEP inválido'])->withInput();
        }

        $data = $response->json();

        Cep::create([
            'cep' => $request->cep,
            'logradouro' => $data['logradouro'] ?? '',
            'bairro' => $data['bairro'] ?? '',
            'cidade' => $data['localidade'] ?? '',
            'estado' => $data['uf'] ?? '',
        ]);

        return redirect()->route('ceps.index')->with('success', 'CEP cadastrado com sucesso!');
    }
}

