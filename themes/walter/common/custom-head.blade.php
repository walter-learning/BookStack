@inject('headContent', 'BookStack\Theming\CustomHtmlHeadContentProvider')

@if (setting('app-custom-head') && !request()->routeIs('settings.category'))
    <!-- Start: custom user content -->
    @if (signedInUser())
        <?php $currentUser = user(); ?>
        <script nonce="{{ $cspNonce }}">window.user_id = '{{$currentUser->email}}';</script>
    @else
        <script nonce="{{ $cspNonce }}">window.user_id = null;</script>
    @endif
    {!! $headContent->forWeb() !!}
    <!-- End: custom user content -->
@endif
