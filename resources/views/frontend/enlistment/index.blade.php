@extends('frontend.layouts.master')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('content')
    <div class="container">
        <h1>Enlistment</h1>
        <h2>1st Rapid Respond Force Enlistment Process</h2>
        <h3>Overview</h3>
        <p>The NATO RRF is a strict military simulation unit which operates within ARMA III using a wide variety of combined arms elements.</p>
        <p>The group is mainly modelled on a US Force, bearing US Army ranks, however its structure is not directly drawn from any real world force. It is instead modelled around what allows us to deploy the best quality of functional simulation in both the meta and game space that the game and circumstance of being a sim unit instead of a real job allow.</p>
        <h3>Membership Criteria</h3>
        <p>The RRF is a NATO group and as such members will be required to be citizens of a NATO member country to partake. The RRF will issue clear and precise forward guidance, at least three months in advance, that details timing. Command Group will also issue clear and immutable ( May only be modified with three months notice of modification ) blocks of time where members are expected to be able to commit, however the schedule will advise which of these blocks they are required to commit to.</p>
        <p><strong>Members must be over the age of 18.</strong></p>
        <h3>Available Assignments</h3>
        <div class="text-center">
            <div class="row">
                <div class="col-lg-4"><a href=""><img src="/frontend/images/140x140.jpg" alt="Placeholder" class="img-rounded"><br>Special Forces</a></div>
                <div class="col-lg-4"><a href=""><img src="/frontend/images/140x140.jpg" alt="Placeholder" class="img-rounded"><br>Motorized Infantry</a></div>
                <div class="col-lg-4"><a href=""><img src="/frontend/images/140x140.jpg" alt="Placeholder" class="img-rounded"><br>Mechanized Forces</a></div>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection