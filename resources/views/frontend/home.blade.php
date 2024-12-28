<x-Frontend-Layout>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div>
                    <img src="{{ asset($latest_post->image) }}" alt="{{ $latest_post->image }}" class="img-fluid" >
                    <h3 >{{ $latest_post->title }}</h3>
                </div>
                <div>
                    {!! $latest_post->description !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="row bg-info">
                    <div class="col-2 ">
                        <h4 class="d-inline-block">ताजा उप्डेट </h4>
                    </div>
                    <div class="col-2">
                        nepal
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
</x-Frontend-Layout>