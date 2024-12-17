@extends('user.layout')

@section('content')


<section class="services">
        <div class="img">
            <img src="{{asset('user/img/services.png')}}" alt="">
        </div>

    <div class="servicesbackground">
        <h2>1</h2>
        <hr>
        <h3><b>Design & Print</b></h3>
            <p style="text-align: left;"><b>
            We print and customised
            your preferred design.</p>
        </div>

    <div class="servicesbackground">
        <h2>2</h2>
        <hr>
        <h3><b>Made by Us</b></h3>
            <p style="text-align: left;">
            High quality materials and
            excellent printing quality.</p>
        </div>

    <div class="servicesbackground">
        <h2>3</h2>
        <hr>
        <h3><b>Deliver</b></h3>
            <p style="text-align: left;">
            Long waiting times are a thing
            of the past! We set new
            standards in logistics.</p>
            </div>
    </section>

@endsection
