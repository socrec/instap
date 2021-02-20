@extends('layouts.app')

@section('content')
<div class="row profile" style="background-image: url('{{ asset($profile->avatar) }}')">
    <div class="col-md-12 space"><br /><br /><br /><br /></div>
    <div class="gradient-bg">
        <div class="row">
            <div class="col-10 offset-1">
                <br /><br /><br />

                <h1>{{ $profile->full_name }}</h1>
                <h4 style="margin-top: -10px; margin-bottom: 15px;"><i>{{ $profile->title }}</i></h4>
                <div class="bio">{{ $profile->bio }}</div>
                <!-- <p>{{ $profile->dob }}</p> -->
            </div>
        </div>
    </div>
</div>
<div class="row social-networks" style="overflow-x:auto;">
    <table class="table table-lg">
        <tbody>
            <tr>
                <td><a target="_blank" href="https://facebook.com/{{ $profile->facebook }}"><img src="{{ asset('social-networks/facebookicon.png') }}"></a></td>
                <td><a target="_blank" href="https://instagram.com/{{ $profile->instagram }}"><img src="{{ asset('social-networks/instagram.png') }}"></a><</td>
                <td><a target="_blank" href="https://twitter.com/{{ $profile->twitter }}"><img src="{{ asset('social-networks/soundcloudnew.png') }}"></a><</td>
                <td><a target="_blank" href="https://twitter.com/{{ $profile->twitter }}"><img src="{{ asset('social-networks/soundcloudnew.png') }}"></a><</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection