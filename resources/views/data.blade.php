@foreach($posts as $post)
    <div class="col-4">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">{{ $post->name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->description }}</p>
                <a href="#" class="btn btn-primary">See More</a>
            </div>
        </div>
    </div>
@endforeach
