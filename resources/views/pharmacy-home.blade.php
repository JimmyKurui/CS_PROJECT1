@extends('layouts.app')

@section('title', 'Pharmacy')
@section('content')
<div class="wrapper pharmacy">
    <section class="hero">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-3 hero-content text-center position-relative order-2 order-md-1">
                    <div>
                        <h1 class="pb-2">Put Your Pharmacy <br> on the Map — Literally</h1>
                        <h4 class="pb-3"><em>More visibility. More trust. More walk-ins</em></h4>
                        <p>Join a growing network of pharmacies sharing live product data to improve access, save time, and serve communities better</p>
                        <a href="{{ route('pharmacies.create') }}">Create profile</a>
                    </div>
                </div>
                <div class="col-12 col-md-9 order-1 order-md-2 hero-image">
                    <img src="{{ asset('images/different-people-doing-volunteer-work-with-food.jpg') }}" alt="Pharmacy Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="mission">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-center mb-2">Mission</h2>
                    <p>
                        <b>Every day, hundreds of people walk past your pharmacy — not knowing you have exactly what they need. We believe that access to medicine shouldn't be a guessing game.
                        </b>
                        <span>That’s why we’re building a real-time, open platform where pharmacies like yours can:</span>
                    </p>
                    <ul>
                        <li>Display product availability to nearby customers</li>
                        <li>Receive direct visibility through both map and table search</li>
                        <li>
                            Get real-time insights on what people are searching.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="benefits flex-wrap flex-md-nowrap">
        <div class="benefits-image">
            <img src="{{ asset('images/drugs display with passing patient.webp') }}" alt="Benefits Image" class="img-fluid">
        </div>
        <div class="benefits-content">
            <ol>
                <li>Geo-visible on a Nairobi map and product search</li>
                <li>Updated in real time — you control what’s shown</li>
                <li>Increased foot traffic from nearby buyers</li>
                <li>Join a citywide transparency initiative backed by open-source values</li>
            </ol>
        </div>
    </section>

    <section class="how-it-works">
        <ul class="timeline">
            <!-- Item 1 -->
            <li>
                <div class="direction-r">
                    <div class="flag-wrapper">
                        <span class="hexa"></span>
                        <span class="flag">Register Pharmacy</span>
                        <span class="time-wrapper"><span class="time">Step 1</span></span>
                    </div>
                    <div class="desc">Tell us where you are and what you stock</div>
                </div>
            </li>

            <!-- Item 2 -->
            <li>
                <div class="direction-l">
                    <div class="flag-wrapper">
                        <span class="hexa"></span>
                        <span class="flag">Update listings</span>
                        <span class="time-wrapper"><span class="time">Step 2</span></span>
                    </div>
                    <div class="desc">Sync, upload, or use our simple dashboard to manage products</div>
                </div>
            </li>

            <!-- Item 3 -->
            <li>
                <div class="direction-r">
                    <div class="flag-wrapper">
                        <span class="hexa"></span>
                        <span class="flag">Be found</span>
                        <span class="time-wrapper"><span class="time">Step 3</span></span>
                    </div>
                    <div class="desc">Consumers nearby see your offerings instantly</div>
                </div>
            </li>
        </ul>
    </section>

    <section class="testimonials">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto col-md-4">
                    <figure>
                        <div class="card">
                            <blockquote class="blockquote card-body m-0 p-1 fs-6">
                                <p>"We joined because we wanted to help our community. Turns out, it helped our business too."</p>
                            </blockquote>
                            <figcaption class="blockquote-footer card-footer m-0 p-1">
                                Naheed, Pharmacy Owner, Eastleigh
                            </figcaption>
                        </div>
                    </figure>
                </div>
                <div class="col-auto col-md-4">
                    <figure>
                        <div class="card">
                            <blockquote class="blockquote card-body m-0 p-1 fs-6">
                                <p>"We joined because we wanted to help our community. Turns out, it helped our business too."</p>
                            </blockquote>
                            <figcaption class="blockquote-footer card-footer m-0 p-1">
                                Naheed, Pharmacy Owner, Eastleigh
                            </figcaption>
                        </div>
                    </figure>
                </div>
                <div class="col-auto col-md-4">
                    <figure>
                        <div class="card">
                            <blockquote class="blockquote card-body m-0 p-1 fs-6">
                                <p>"We joined because we wanted to help our community. Turns out, it helped our business too."</p>
                            </blockquote>
                            <figcaption class="blockquote-footer card-footer m-0 p-1">
                                Naheed, Pharmacy Owner, Eastleigh
                            </figcaption>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12">
                    <p>💡 Ready to get started? It takes 5 minutes to join. Let’s make access to medicine easier — together.</p>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-around">
                    <a href="{{ route('pharmacies.create') }}" class="btn primary-btn" alt="register pharmacy link">Register Pharmacy</a>
                    <a href="https://www.youtube.com/@trootrooper28" class="btn secondary-btn" alt="kurui tech youtube channel">View Quick Demo</a>                </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
@endsection