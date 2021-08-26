@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Verifique seu e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Reenviamos o e-mail com link de verificação. Consulte sua caixa de entrada.
                        </div>
                    @endif

                    Para prosseguir, realize a verificação de e-mail.

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui para reenviar o e-mail de verificação</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
