<!-- Bagian FAQ -->
<section class="faq-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-tag">Pertanyaan</span>
            <h2>Pertanyaan yang Sering Diajukan</h2>
            <p>
                Cari jawaban atas pertanyaan umum seputar layanan boosting kami
            </p>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2" data-aos="fade-up">
                <div class="accordion" id="faqAccordion">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $loop->index }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
