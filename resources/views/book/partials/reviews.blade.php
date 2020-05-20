@foreach ($reviews as $review)
    <div class="review pt-3 pb-1 {{ !$loop->last ? 'border-bottom' : '' }}">
        <h5>{{ $review->user->name }}</h5>
        <div class="stars">
            @for ($i = 1; $i <= 5; $i++)
                <span class="text-{{ $i <= $review->rating ? 'warning' : 'lightgray' }}">
                    <i class="fas fa-star"></i>
                </span>
            @endfor
        </div>
        <p class="mt-2">{{ $review->comment }}</p>
    </div>
@endforeach
<div class="clearfix">
    <div class="float-right reviews-pagination">
        {{ $reviews->links() }}
    </div>
</div>