
@component('mail::message')
   
    <h1> Olá, {{$user->name}}. </h1>
    <h2>Boas-vindas a você!</h2>
    <p>Parabéns por ter se tornado um de nossos clientes!</p>
    <p>Att,</p><br><br>
    <p>Amanda Ferreira - Estágio em desenvolvimento back-end</p>

    @component('mail::button', ['url' => 'https://www.agenciaecode.com.br/home#home'])
        Conheça nosso site!
    @endcomponent

@endcomponent
