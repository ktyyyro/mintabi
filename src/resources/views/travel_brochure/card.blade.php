<!-- Card -->
<div class="card mt-3">
  <div class="card-body d-flex flex-row">
  <div class="card-body pt-0">
    <h3 class="h4 card-title">
        <a href="{{ route('travel_brochure.show',$book->id) }}">{{ $book->destination }}</a>
    </h3>
    <div class="card-text">
        <p class="card-text">{{ $book->remark }}</p>
    </div>
  </div>
  </div>
</div>
<!-- Card -->
