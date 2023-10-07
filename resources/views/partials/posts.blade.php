{{ $posts->links() }}
<div class="my-5"></div>
    @forelse($posts as $post)

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->body }}</p>
            </div>
        </div>

    @empty
    @endforelse




