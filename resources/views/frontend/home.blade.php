<x-Frontend-Layout>
    <section>
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-7">
                    <div>
                        <img src="{{ asset($latest_post->image) }}" alt="{{ $latest_post->image }}" class="img-fluid">
                        <h3>{{ $latest_post->title }}</h3>
                    </div>
                    <div>
                        {!! $latest_post->description !!}
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-8">
                            @foreach ($latest_post as $post)
                                <img src="{{ asset($post->image) }}" alt="{{ $post->image }}" srcset="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-Frontend-Layout>
