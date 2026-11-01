@extends('backend.layout.master')
@section('title', 'Contact Request')

@section('content')
    <div class="content-wrapper rs-admin-page rs-contact-detail-page">
        <div class="rs-page-head">
            <div>
                <span>Leads</span>
                <h1>Contact Request</h1>
                <p>Review the enquiry submitted from the website.</p>
            </div>
            <a class="rs-contact-back" href="{{ route('contactus') }}"><i class="ti-arrow-left"></i> Back to contacts</a>
        </div>

        <section class="rs-contact-identity">
            <span class="rs-contact-avatar"><i class="ti-user"></i></span>
            <div class="rs-contact-identity-copy">
                <span class="rs-contact-eyebrow">Enquiry from</span>
                <h2>{{ $contact->fullName() ?: 'Unknown contact' }}</h2>
                <span class="rs-contact-received"><i class="ti-time"></i> Received {{ optional($contact->created_at)->format('d M Y, h:i A') ?: 'date unavailable' }}</span>
            </div>
        </section>

        <section class="rs-contact-info-grid" aria-label="Contact information">
            <article class="rs-contact-info-card">
                <span class="rs-contact-info-icon"><i class="ti-email"></i></span>
                <div>
                    <span class="rs-contact-info-label">Email address</span>
                    @if ($contact->email)
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    @else
                        <strong>Not provided</strong>
                    @endif
                </div>
            </article>
            <article class="rs-contact-info-card">
                <span class="rs-contact-info-icon"><i class="ti-mobile"></i></span>
                <div>
                    <span class="rs-contact-info-label">Phone number</span>
                    @if ($contact->phone_number)
                        <a href="tel:{{ $contact->phone_number }}">{{ $contact->phone_number }}</a>
                    @else
                        <strong>Not provided</strong>
                    @endif
                </div>
            </article>
        </section>

        <section class="card rs-contact-message">
            <div class="rs-contact-message-heading">
                <span class="rs-contact-info-icon"><i class="ti-comment-alt"></i></span>
                <div>
                    <span class="rs-contact-info-label">Message</span>
                    <h2>Enquiry details</h2>
                </div>
            </div>
            <div class="rs-contact-message-body">{{ $contact->message ?: 'No message provided.' }}</div>
        </section>
    </div>
@endsection
