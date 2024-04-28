@extends('layouts.page')

@section('content')
<!-- Main Content Start -->
<main class="page-content space-top">
    <div class="container">
        <div class="accordion dz-accordion style-2" id="accordionFaq">
            @foreach($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$faq->id}}">
                        <a href="javascript:void(0);" class="accordion-button {{ $faq->id > 1 ? 'collapsed' : ''}}" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                            {{ $faq->tanya }}
                        </a>
                    </h2>
                    <div id="collapse{{$faq->id}}" class="accordion-collapse collapse {{ $faq->id == 1 ? 'show' : ''}}" aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <p class="m-b0">{{ $faq->jawab }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
<!-- Main Content End -->
@endsection
