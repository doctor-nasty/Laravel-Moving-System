@extends('layouts.master', ['title' => 'FAQ'])




@section('content')
<section id="page-title" class="page-title-dark py-6">
    <div class="container clearfix">
        <h1>Frequently Asked Questions</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
        </ol>
    </div>
</section>
<section id="content">
<div class="faqs-container">
	<div class="faq active">
		<h3 class="faq-title">
			How does MovingWyze.com work?
		</h3>
		<p class="faq-text">
			MovingWyze.com is a platform that connects customers with reliable moving companies, car carriers, and storage providers. Simply provide your moving details on our website, and we'll connect you with up to four pre-vetted service providers that match your requirements.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>

	<div class="faq">
		<h3 class="faq-title">
			How much does it cost to use MovingWyze.com?
		</h3>
		<p class="faq-text">
			Using MovingWyze.com is completely free for customers. We don't charge any fees for our service.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>

	<div class="faq">
		<h3 class="faq-title">
			How do you ensure the quality of the service providers on your platform?
		</h3>
		<p class="faq-text">
			We carefully vet each service provider in our network to ensure they meet our high standards. Our partners must be licensed, insured, and maintain a strong reputation for providing top-notch moving services. This way, you can trust that you're working with the best in the industry.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>

	<div class="faq">
		<h3 class="faq-title">
			Can MovingWyze.com help me with international moves?
		</h3>
		<p class="faq-text">
			Absolutely! We have a network of international moving companies that can help you with the entire relocation process, including customs paperwork and shipping. Our goal is to make your international move as stress-free as possible.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>

	<div class="faq">
		<h3 class="faq-title">
			How can I trust the reviews and ratings on MovingWyze.com?
		</h3>
		<p class="faq-text">
			We strive to maintain a trustworthy platform by ensuring that all reviews and ratings come from real customers who have used the services of our partner providers. This helps you decide when choosing a moving company, car carrier, or storage provider.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>

	<div class="faq">
		<h3 class="faq-title">
			Can I find packing supplies and moving boxes through MovingWyze.com?
		</h3>
		<p class="faq-text">
			Yes, you can find moving boxes and packing supplies from reputable vendors through our platform. Many of our moving partners also offer moving supplies for sale and specialty packing services to make your move even more convenient.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>

	<div class="faq">
		<h3 class="faq-title">
			How far in advance should I book my moving services through MovingWyze.com?
		</h3>
		<p class="faq-text">
			We recommend booking your moving services at least four to six weeks in advance to ensure the best availability and pricing. However, our platform is designed to accommodate last-minute moves, so don't hesitate to reach out even if your move is just around the corner.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
</div>

<script>const toggles = document.querySelectorAll('.faq-toggle');

    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            toggle.parentNode.classList.toggle('active');
        });
    });

    // SOCIAL PANEL JS
    const floating_btn = document.querySelector('.floating-btn');
    const close_btn = document.querySelector('.close-btn');
    const social_panel_container = document.querySelector('.social-panel-container');

    floating_btn.addEventListener('click', () => {
        social_panel_container.classList.toggle('visible')
    });

    close_btn.addEventListener('click', () => {
        social_panel_container.classList.remove('visible')
    });</script>
    </section>
@endsection
