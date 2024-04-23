<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    td {
        text-align: left;
    }

    .actions-column {
        width: 20%;
    }
</style>

<script type="text/php">
    @if (isset($pdf))
    // OLD
    // $font = Font_Metrics::get_font("helvetica", "bold");
    // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
    // v.0.7.0 and greater
    $x = 72;
    $y = 18;
    $text = "{PAGE_NUM} of {PAGE_COUNT}";
    $font = $fontMetrics->get_font("helvetica", "bold");
    $size = 6;
    $color = array(255,0,0);
    $word_space = 0.0;  //  default
    $char_space = 0.0;  //  default
    $angle = 0.0;   //  default
    $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    @endif
</script>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Review Text</th>
            <th scope="col">Review Sentiment</th>
            <th scope="col">Product</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->name }}</td>
                <td>{{ $review->review_text }}</td>
                <td>{{ $review->review_sentiment }}</td>
                <td>{{ $review->product->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
