@extends('layout.layout')

@section('content')

    <!-- Contact Section -->

    <div class="contact-information">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ "Mesajınız göndərildi. Tezliklə cavab veriləcək." }}
                </div>
            @endif
            <div class="map-contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12149.02760156222!2d49.8782433!3d40.42531!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x64c67f752adb0fe9!2sTurkuaz+Santexnika+%26+M%C9%99rm%C9%99r!5e0!3m2!1str!2s!4v1562742623696!5m2!1str!2s" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="address-contact">
                        <h2>{{ __('contact.address') }}</h2>
                        <p>Ziya Bünyadov 2113</p>
                        <p>Mobil: 055 792 12 12</p>
                        <p>info@turkuaz.az</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="" method="POST">
                            @csrf
                            <h2>{{ __('contact.writeUs') }}.</h2>
                            <input placeholder="{{ __('contact.name') }}" type="text" name="name" required>
                            <input placeholder="{{ __('contact.email') }}" type="email" name="email" required>
                            <input placeholder="{{ __('contact.mobile') }}" type="text" name="mobile" required>
                            <textarea placeholder="{{ __('contact.message') }}" rows="8" name="message" required></textarea>
                            <button type="submit">{{ __('contact.send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Endsection -->


@endsection