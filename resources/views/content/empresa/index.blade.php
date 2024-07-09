@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Empresa /</span> Minha Empresa
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
          Conta</a></li>
      {{-- <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i
            class="bx bx-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i
            class="bx bx-link-alt me-1"></i> Connections</a></li> --}}
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Detalhes da Empresa</h5>
      <!-- Account -->

      <hr class="my-0">
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">CNPJ</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                  <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe"
                    aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ $record['cnpj'] }}"
                    readonly name="cnpj" readonly />
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Razão Social</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <input type="text" id="basic-icon-default-company" class="form-control"
                    placeholder="Razão Social da Empresa" aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2" value="{{ $record['nome'] }}" readonly name="nome"
                    readonly />
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Nome Fantasia</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <input type="text" id="basic-icon-default-company" class="form-control" placeholder="Nome Fantasia"
                    aria-label="ACME Inc." aria-describedby="basic-icon-default-company2"
                    value="{{ $record['fantasia'] }}" name="fantasia" readonly />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-email">Email <b class="text-danger">*</b></label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                  <input type="text" id="basic-icon-default-email" class="form-control" placeholder="john.doe"
                    aria-label="john.doe" aria-describedby="basic-icon-default-email2"
                    value="{{ $record['email'] ?? '' }}" name="email" readonly />

                </div>
                <div class="form-text"> Você pode usar letras, números e pontos</div>
              </div>

            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Telefone <b class="text-danger">*</b></label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                    placeholder="(XX) X.XXXX-XXXX" aria-label="(xx) x.xxxx-xxxx"
                    aria-describedby="basic-icon-default-phone2" value="{{ $record['telefone']  ?? ''}}" name="telefone"
                    readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">CEP <b class="text-danger">*</b></label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                    placeholder="(XX) X.XXXX-XXXX" aria-label="(xx) x.xxxx-xxxx"
                    aria-describedby="basic-icon-default-phone2" value="{{ $record['cep'] ?? '' }}" name="cep"
                    readonly />
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Endereço</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                    placeholder="Endereço da empresa" aria-label="(xx) x.xxxx-xxxx"
                    aria-describedby="basic-icon-default-phone2" value="{{ $record['logradouro']  ?? '' }}" readonly
                    name="logradouro" />
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Número <b class="text-danger">*</b></label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Número"
                    aria-label="(xx) x.xxxx-xxxx" aria-describedby="basic-icon-default-phone2"
                    value="{{ $record['numero'] ?? '' }}" name="numero" />
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Bairro</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Bairro"
                    aria-label="(xx) x.xxxx-xxxx" aria-describedby="basic-icon-default-phone2"
                    value="{{ $record['bairro'] ?? '' }}" readonly name="bairro" />
                </div>
              </div>
            </div>


            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-email">Municipio</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                  <input type="text" id="basic-icon-default-email" class="form-control" placeholder="Cidade"
                    aria-label="john.doe" aria-describedby="basic-icon-default-email2"
                    value="{{ $record['municipio'] ?? '' }}" readonly name="municipio" />

                </div>
              </div>

            </div>

            <div class="col-md-2">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-email">Estado</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                  <input type="text" id="basic-icon-default-email" class="form-control" placeholder="Estado"
                    aria-label="john.doe" aria-describedby="basic-icon-default-email2" value="{{ $record['uf'] ?? '' }}"
                    readonly name="uf" />

                </div>
              </div>

            </div>
          </div>


          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>

  </div>
</div>
@endsection