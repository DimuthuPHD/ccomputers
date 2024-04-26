<div class="comments_Box {{$review->review_sentiment}}">
    <div class="img_wrapper">
        <img src="{{ asset("images/shop/electronics/moods/{$review->review_sentiment}.png") }}"
            class="" alt="author_img">
    </div>
    <div class="text_wrapper">
        <div class="author_detail">
            <span class="author_name"> {{$review->name}} - </span>
            <span class="publish_date">{{\Carbon\Carbon::parse($review->created_at)->format('d F, Y')}}</span>
        </div>
        <div class="author_content">
            <p>{{$review->review_text}}</p>
        </div>
    </div>
</div>
