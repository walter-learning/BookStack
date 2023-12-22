@extends('layouts.simple')

@section('body')
    <main class="content-wrap mt-m" style="max-width: 1000px; margin: auto;">
        <div style="margin-bottom: 1rem">
            <?php $currentUser = user(); ?>
            <div style="max-width: 310px;">
                <h2 style="color: #94a3b8; font-weight: 600; font-size: 15px;">{{ $currentUser->name }}</h2>
                <h1 style="font-weight: 800; font-size: 25px;">Bienvenue sur votre base de connaissance</h1>
            </div>

            <div style="display: flex;">
                <div style="padding: 0 10px 0 0">
                    <a href="https://walter-learning.com/" target="_blank"
                        style="display: block; padding: 10px; background-color: white;">Site internet Walter Learning</a>
                </div>
                <div style="padding: 0 10px">
                    <a href="https://docs.google.com/spreadsheets/d/1-UIgjZDZkNZ9fjPBuA1F3GkWJq4JC5iQV7vFgVsE0MU/edit?pli=1#gid=1741675441"
                        target="_blank" style="display: block; padding: 10px; background-color: white;">Formations 2024</a>
                </div>
                <div style="padding: 0 10px">
                    <a href="https://app.walter-learning.com/" target="_blank"
                        style="display: block; padding: 10px; background-color: white;">Espace apprenant (LMS)</a>
                </div>
                <div style="padding: 0 0 0 10px">
                    <a href="https://walterlearning.lightning.force.com/lightning/page/home" target="_blank"
                        style="display: block; padding: 10px; background-color: white;">Salesforce</a>
                </div>
            </div>

            <div dir="auto">
                {!! isset($customHomepage->renderedHTML) ? $customHomepage->renderedHTML : $customHomepage->html !!}
            </div>
        </div>

        <div class="card p-l mt-l">
            <div class="grid half v-center">
                <h2 class="list-heading">{{ trans('entities.shelves') }}</h1>
                    {{-- <div class="text-right"> --}}
                    {{--    @include('common.sort', $listOptions->getSortControlData()) --}}
                    {{-- </div> --}}
            </div>

            @if (count($shelves) > 0)
                @if ($view === 'list')
                    <div class="entity-list">
                        @foreach ($shelves as $index => $shelf)
                            @if ($index !== 0)
                                <hr class="my-m">
                            @endif
                            @include('shelves.parts.list-item', ['shelf' => $shelf])
                        @endforeach
                    </div>
                @else
                    <div class="grid third">
                        @foreach ($shelves as $key => $shelf)
                            @include('entities.grid-item', ['entity' => $shelf])
                        @endforeach
                    </div>
                @endif
                <div>
                    {!! $shelves->render() !!}
                </div>
            @else
                <p class="text-muted">{{ trans('entities.shelves_empty') }}</p>
                @if (userCan('bookshelf-create-all'))
                    <a href="{{ url('/create-shelf') }}"
                        class="button outline">@icon('edit'){{ trans('entities.create_now') }}</a>
                @endif
            @endif
        </div>
    </main>
@stop

@section('left')
    @include('home.parts.sidebar')
@stop

@section('right')

    {{-- <div class="actions mb-xl"> --}}
    {{-- <h5>{{ trans('common.actions') }}</h5> --}}
    {{-- <div class="icon-list text-link"> --}}
    {{-- @if (user()->can('bookshelf-create-all'))
                <a href="{{ url('/create-shelf') }}" class="icon-list-item">
                    <span>@icon('add')</span>
                    <span>{{ trans('entities.shelves_new_action') }}</span>
                </a>
            @endif --}}
    {{-- @include('entities.view-toggle', ['view' => $view, 'type' => 'bookshelves']) --}}
    {{-- @include('home.parts.expand-toggle', ['classes' => 'text-link', 'target' => '.entity-list.compact .entity-item-snippet', 'key' => 'home-details']) --}}
    {{-- @include('common.dark-mode-toggle', ['classes' => 'icon-list-item text-link']) --}}
    {{-- </div> --}}
    {{-- </div> --}}
@stop
