@switch($stateText)
    @case ("SUBMITTED")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Receive
    </x-articles.button>
    <x-articles.button
        class="btn-outline-danger"
        :route="route('reviews.create')">
        Out of Scope
    </x-articles.button>
    @break
    @case ("RECEIVED")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Add reviewer
    </x-articles.button>
    @break
    @case ("UNDER REVIEW")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Accept
    </x-articles.button>
    <x-articles.button
        class="btn-outline-danger"
        :route="route('reviews.create')">
        Reject
    </x-articles.button>
    <x-articles.button
        class="btn-outline-primary"
        :route="route('reviews.create')">
        Request revision
    </x-articles.button>
    @break
    @case ("WAITING FOR REVISED VERSION")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Add revision
    </x-articles.button>
    @break
    @case ("ACCEPTED, WAITING FOR SOURCE FILE")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Upload source file
    </x-articles.button>
    @break
    @case ("EDITING")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Add file
    </x-articles.button>
    @break
    @case ("WAITING FOR COMMENTS")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Add comment
    </x-articles.button>
    @break
    @case ("WILL BE PUBLISHED")
    <x-articles.button
        class="btn-outline-success"
        :route="route('reviews.create')">
        Publish
    </x-articles.button>
    @break
@endswitch
