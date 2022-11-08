@switch($stateText)
    @case ("SUBMITTED")
    <x-articles.button
        bgColor="#8fcb8f"
        :route="route('reviews.create')">
        Review
    </x-articles.button>
    <x-articles.button
        bgColor="#cd5c5c"
        :route="route('reviews.create')">
        Out of Scope
    </x-articles.button>
    <x-articles.button
        bgColor="#cd5c5c"
        :route="route('reviews.create')">
        Revision
    </x-articles.button>
    @break
    @default
    <x-articles.button
        bgColor="#cd5c5c"
        :route="route('reviews.create')">
        Out of Scope
    </x-articles.button>
@endswitch
