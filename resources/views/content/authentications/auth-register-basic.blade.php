@extends('layouts/blankLayout')

@section('title', 'Registrar Básico - Páginas')

@section('page-style')
<!-- Página -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y"
    style="display:flex; justify-content: center; align-items: center;">
    <div class="authentication-inner mt-5">
      <!-- Cartão de Registro -->
      <div class="card mt-5">
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
          <h4 class="mb-2 text-center">A aventura começa aqui 🚀</h4>
          <p class="mb-4 text-center">Torne a sua empresa reconhecida no mercado!</p>

          <form class="mb-3" method="POST" action="{{ route('cadastrar') }}">
            @csrf

            <div class="mb-3">
              <label for="username" class="form-label">Nome da Empresa</label>
              <input type="text" class="form-control" id="empresa" name="empresa" value="{{ $empresa->nome }}" readonly>
              <input type="hidden" name="cnpj" value="{{ $empresa->cnpj }}">
              <input type="hidden" name="fantasia" value="{{ $empresa->fantasia }}">
              <input type="hidden" name="email_empresa" value="{{ $empresa->email }}">
              <input type="hidden" name="telefone" value="{{ $empresa->telefone }}">
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">Nome de usuário</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome de usuário"
                autofocus>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
            </div>

            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Senha</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password"> Confirmar Senha</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password_confirmation"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" autocomplete="new-password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>



            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  Concordo com os
                  <a href="javascript:void(0);">termos e políticas de privacidade</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100" type="submit">
              Registrar
            </button>
          </form>

          <p class="text-center">
            <span>Já tem uma conta?</span>
            <a href="{{url('auth/login-basic')}}">
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