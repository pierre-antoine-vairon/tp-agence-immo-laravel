<div class="card">
    <h5 class="card-body">
        <a href="#">{{ $property->title }}</a>
    </h5>
    <p class="card-text">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
    <div class="text-primary fw-bold" style="font-size: 1.4rem;">
        {{ number_format($property->price, thousands_separator: ' ')}} €
    </div>
</div>