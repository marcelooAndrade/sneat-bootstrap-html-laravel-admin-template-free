@extends('layouts/blankLayout')

@section('title', 'Validar Empresa - Páginas')

@section('page-style')
<!-- Página -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">

    <div class="card  w-75 py-3 card-company">
        <!-- Logotipo -->
        <div class="app-brand justify-content-center py-2">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
                <span
                    class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
                <span class="app-brand-text demo text-body fw-bold">{{config('variables.templateName')}}</span>
            </a>
        </div>
        <!-- /Logotipo -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Dados</h5>
            <small class="text-danger float-end">Os campos com (*) são editáveis</small>
        </div>
        <div class="card-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
            @endif
            <form action="{{ route('cadastrar.empresa') }}" method="POST">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">CNPJ</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="John Doe" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" value="{{ $record['cnpj'] }}"
                                    readonly name="cnpj" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Razão Social</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Razão Social da Empresa" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" value="{{ $record['nome'] }}"
                                    readonly name="nome" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Nome Fantasia</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Nome Fantasia" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" value="{{ $record['fantasia'] }}"
                                    name="fantasia" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email <b
                                    class="text-danger">*</b></label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="basic-icon-default-email" class="form-control"
                                    placeholder="john.doe" aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2" value="{{ $record['email'] ?? '' }}"
                                    name="email" />

                            </div>
                            <div class="form-text"> Você pode usar letras, números e pontos</div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Telefone <b
                                    class="text-danger">*</b></label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="(XX) X.XXXX-XXXX" aria-label="(xx) x.xxxx-xxxx"
                                    aria-describedby="basic-icon-default-phone2" value="{{ $record['telefone']  ?? ''}}"
                                    name="telefone" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">CEP <b
                                    class="text-danger">*</b></label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="(XX) X.XXXX-XXXX" aria-label="(xx) x.xxxx-xxxx"
                                    aria-describedby="basic-icon-default-phone2" value="{{ $record['cep'] ?? '' }}"
                                    name="cep" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Endereço</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Endereço da empresa" aria-label="(xx) x.xxxx-xxxx"
                                    aria-describedby="basic-icon-default-phone2"
                                    value="{{ $record['logradouro']  ?? '' }}" readonly name="logradouro" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Número <b
                                    class="text-danger">*</b></label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Número" aria-label="(xx) x.xxxx-xxxx"
                                    aria-describedby="basic-icon-default-phone2" value="{{ $record['numero'] ?? '' }}"
                                    name="numero" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Bairro</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Bairro" aria-label="(xx) x.xxxx-xxxx"
                                    aria-describedby="basic-icon-default-phone2" value="{{ $record['bairro'] ?? '' }}"
                                    readonly name="bairro" />
                            </div>
                        </div>
                    </div>


                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Municipio</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="basic-icon-default-email" class="form-control"
                                    placeholder="Cidade" aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2"
                                    value="{{ $record['municipio'] ?? '' }}" readonly name="municipio" />

                            </div>
                        </div>

                    </div>

                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Estado</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="basic-icon-default-email" class="form-control"
                                    placeholder="Estado" aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2" value="{{ $record['uf'] ?? '' }}"
                                    readonly name="uf" />

                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div>
                            <a href="{{ route('cadastrar.empresa') }}" class="btn btn-ligth ">Cancelar</a>
                        </div>
                        <div class="px-3">
                            <button type=" submit" class="btn btn-primary ">Registrar Empresa</button>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app.js')}}"></script>

@endsection