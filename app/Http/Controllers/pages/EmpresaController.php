<?php

namespace App\Http\Controllers\pages;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\ConsultasApi;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{

    public function index()
    {
      $record = Auth::user()->empresa[0];
      return view('content.empresa.index', ['record' => $record]);

    }

    public function create()
    {
        return view('content.empresa.cadastrar');
    }
    public function consultarEmpresa(Request $request): RedirectResponse
    {
        $request['cnpj'] = preg_replace('/[^0-9]/', '', $request->input('cnpj'));

        $cnpj = Empresa::where('cnpj', $request['cnpj'])->first();

        if ($cnpj) {

            $errors = new MessageBag(['message-error' => 'CNPJ já cadastrado!']);
            return redirect()->route('cadastrar.empresa')->withErrors($errors);
        }

        $request->validate([
            'cnpj' => ['required', 'string', 'max:255', 'unique:' . Empresa::class, 'digits:14'],
            'terms' => ['required']
        ]);

        $data = $request->except('_token');
        $consultasApi = new ConsultasApi();
        $response = $consultasApi->consultaCnpj($data['cnpj']);


        $records = $response->getData(true);

        return redirect()->route('validar.empresa', ['records' => $records]);
    }

    public function validarEmpresa(Request $request)
    {

        $record = $request->records;
        return view('content.empresa.validar-empresa', ['record' => $record]);
    }

    public function store(Request $request)
    {

        $request['cnpj'] = preg_replace('/[^0-9]/', '', $request->input('cnpj'));

        $rules = [
            'cnpj' => ['required', 'string', 'max:255', 'unique:' . Empresa::class, 'digits:14'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Empresa::class],
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'municipio' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'max:255'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->route('validar.empresa', ['records' => $request->all()])->withErrors($errors);
        }

        $empresa = new Empresa();
        $empresa->cnpj = $request->cnpj;
        $empresa->nome = $request->nome;
        $empresa->fantasia = Str::lower($request->fantasia);
        $empresa->email = $request->email;
        $empresa->telefone = $request->telefone;

        if (!$empresa->save()) {
            $errors = new MessageBag(['message-error' => 'Erro ao cadastrar empresa!']);
            return redirect()->route('validar.empresa', ['records' => $request->all()])->withErrors($errors);
        }

        return redirect()->route('cadastrar.usuario', ['empresa' => $empresa]);
    }
}
