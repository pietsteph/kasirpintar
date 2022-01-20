@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center gap-4 mb-5 pt-4 pb-5 border-bottom">
                <img class="d-block border border-dark rounded-circle" src="{{ url('/images/profile.jpg') }}" alt="Profile Photo" width="300px">
                <div>
                    <h2 class="text-dark mb-0">Pieter Stephenson Limanto</h2>
                    <h4 class="mb-4">Web Developer</h4>
                    <div class="row mb-1">
                        <div class="text-dark col-3">Phone</div>
                        <div class="col-9">+6285156037140</div>
                    </div>
                    <div class="row mb-1">
                        <div class="text-dark col-3">Email</div>
                        <div class="col-9"><a class="text-light" href="mailto:pieterboa@yahoo.co.id">pieterboa@yahoo.co.id</a></div>
                    </div>
                    <div class="row mb-0">
                        <div class="text-dark col-3">Linkedin</div>
                        <div class="col-9"><a class="text-light" href="https://linkedin.com/in/pietsteph" target="_blank">pietsteph</a></div>
                    </div>
                </div>
            </div>

            <div class="text-center mb-5 pb-5 border-bottom">
                <h2 class="text-dark mb-4">About Me</h2>
                <p class="m-0">I'm a web developer with 2 years+ of experience in problem-solving, developing user interface and back-end's API. Responsible to improve data retrieval and workflow efficiencies.</p>
            </div>

            <div class="text-center mb-5 pb-5 border-bottom">
                <h2 class="text-dark mb-4">Education History</h2>
                <h5 class="m-0">University of Surabaya</h5>
                <p class="m-0">Informatics Engineering</p>
                <p class="m-0">2015 - 2019</p>
            </div>

            <div class="text-center mb-5 pb-5 border-bottom">
                <h2 class="text-dark mb-4">Work Experience</h2>
                <h5 class="m-0">PT. Berkat Bejana Anugerah</h5>
                <p class="m-0">Web Developer</p>
                <p class="m-0">Jan 2020 - Jan 2022</p>
            </div>

            <div class="text-center pb-5">
                <h2 class="text-dark mb-4">Skills</h2>
                <div class="d-flex justify-content-between gap-3">
                    <span>Laravel</span>
                    <span>PHP</span>
                    <span>HTML5</span>
                    <span>CSS3</span>
                    <span>JavaScript</span>
                    <span>jQuery</span>
                    <span>MySQL</span>
                    <span>Vue.js</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container {
        color: white;
    }
</style>
