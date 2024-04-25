@extends('layouts.page')

@section('content')
<!-- Main Content Start -->
<main class="page-content space-top">
    <div class="container">
        <div class="accordion dz-accordion style-2" id="accordionFaq1">
            @foreach($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1">
                        <a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            {{ $faq->tanya }}
                        </a>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse {{ $faq->id == 1 ? 'show' : ''}}" aria-labelledby="heading1" data-bs-parent="#accordionFaq1">
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
