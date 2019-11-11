@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Tell your friends about the conference</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-2">
                            <a href="<?php Config::get('social.twitter.url')?>" class="twitter-share-button" data-size="large" data-text="<?php Config::get('social.twitter.text')?>" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            {{--                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="Check out this Meetup with SoCal AngularJS!" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
                        </div>
                        <div class="col-3' id="fb-roo"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v4.0"></script>
                    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Поделиться</a></div>

                    <div class="col-4">
                        <a class="btn btn-primary btn-lg active" role="button" aria-pressed="true" href="/members">All members</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
