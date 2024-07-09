@extends('layouts/blankLayout')

@section('title', 'Registrar Básico - Páginas')

@section('page-style')
<!-- Página -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Cartão de Registro -->
      <div class="card">
        <div class="card-body">
          <!-- Logotipo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span
                class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-body fw-bold">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logotipo -->
          <h4 class="mb-2">A aventura começa aqui 🚀</h4>
          <p class="mb-4">Torne a sua empresa reconhecida no mercado!</p>
          <div id="overlay" class="overlay" style="display: none">
            <div class="demo-inline-spacing text-center">
              <div class="spinner-border spinner-border-lg text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <h4 class="mb-4">Consultando as informações!</h4>
            </div>
          </div>
          <form class="mb-3" method="Get" action="{{ route('consultar.empresa') }}">
            @csrf
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{ $error }}
            </div>
            @endforeach
            @endif

            <span class="alert alert-danger" role="alert" id="mensagem" style="display: none"></span>
            <div class="mb-3">
              <label for="username" class="form-label">Cnpj da Empresa</label>
              <input type="text" class="form-control" id="cnpj" name="cnpj" data-toggle="input-mask"
                data-mask-format="00.000.000/0000-00" placeholder="Digite o cnpj da empresa" autofocus>
            </div>

            {{-- <div class="mb-3">
              <label for="username" class="form-label">Nome da Empresa</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o cnpj da empresa"
                autofocus>
            </div>
            <div class="mb-3">
              <label for="cep" class="form-label">Cep da Empresa</label>
              <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o cep da empresa">
            </div>

            <div class="mb-3">
              <label for="numero" class="form-label">Numero da Empresa</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o numero">
            </div> --}}






            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  Concordo com os
                  <a href="javascript:void(0);">termos e políticas de privacidade</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100" type="submit" id="registerButton">
              Registrar
            </button>
          </form>

          <p class="text-center">
            <span>Já tem uma conta?</span>
            <a href="{{url('login')}}">
              <span>Entre em vez disso</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Cartão de Registro -->
    </div>
  </div>
</div>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app.js')}}"></script>

@endsection