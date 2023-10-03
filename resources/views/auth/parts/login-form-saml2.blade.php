<form action="{{ url('/saml2/login') }}" method="POST" id="login-form" class="mt-l">
    {!! csrf_field() !!}

    <div>
        <a href="https://walter-learning-adtest.awsapps.com/start#/saml/default/Walter%20Academy/ins-0c9a8109e274d9d1" id="saml-login" class="button outline svg">
            @icon('saml2')
            <span>{{ trans('auth.log_in_with', ['socialDriver' => config('saml2.name')]) }}</span>
        </a>
    </div>

</form>