@extends('layouts.app')
@section('content')
<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_deliveboo">
            <img src="logo.png" alt="logo" class="w-25">
        </div>
        <h1 class="display-5 fw-bold">
            Welcome to DelivBoo
        </h1>

        <p class="col-md-8 fs-4">
            Welcome to DelivBoo - Elevate your restaurant's reach and delight customers with our seamless food delivery
            service.
            Join our network, showcase your culinary expertise, and let us handle the logistics while you focus on
            crafting exceptional dining experiences.


        </p>
        {{-- <a href="https://github.com/lambia/LC-20230627-laravel-template" class="btn btn-primary btn-lg"
            type="button">Documentation --}}</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Copyright © 2024 Your Company Name. All rights reserved.

            The information and code contained in this file are the exclusive property
            of Your Company Name. Unauthorized reproduction, in whole or in part,
            or distribution of this source code, or the information contained herein,
            is strictly prohibited unless specifically authorized by DelivBoo.</p>
    </div>
</div>
@endsection