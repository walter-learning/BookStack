<section component="page-comments"
         option:page-comments:page-id="{{ $page->id }}"
         option:page-comments:created-text="{{ trans('entities.comment_created_success') }}"
         option:page-comments:count-text="{{ trans('entities.comment_count') }}"
         class="comments-list"
         aria-label="{{ trans('entities.comments') }}">

    <div refs="page-comments@comment-count-bar" class="grid half left-focus v-center no-row-gap">
        @if(userCan('page-update', $page))
            <h5 refs="page-comments@comments-title">{{ trans_choice('entities.comment_count', $commentTree->count(), ['count' => $commentTree->count()]) }}</h5>
        @else
            <h5 refs="page-comments@comments-title"></h5>
        @endif        
        @if ($commentTree->empty() && userCan('comment-create-all'))
            <div class="text-m-right" refs="page-comments@add-button-container">
                <button type="button"
                        refs="page-comments@add-comment-button"
                        class="button outline">{{ trans('entities.comment_add') }}</button>
            </div>
        @endif
    </div>

    @if(userCan('page-update', $page))
        <div refs="page-comments@commentContainer" class="comment-container">
            @foreach($commentTree->get() as $branch)
                @include('comments.comment-branch', ['branch' => $branch, 'readOnly' => false])
            @endforeach
        </div>
    @endif

    @if(userCan('comment-create-all'))
        @include('comments.create')

        @if (!$commentTree->empty())
            <div refs="page-comments@addButtonContainer" class="text-right">
                <button type="button"
                        refs="page-comments@add-comment-button"
                        class="button outline">{{ trans('entities.comment_add') }}</button>
            </div>
        @endif
    @endif

</section>