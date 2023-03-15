@extends("layout.main")

@push("title")
    Teacher Home
@endpush

@section("main-section")
    <x-navbar textcolor="primary" bgcolor="light" homelink="/" name="braja" classlink="/" preseentlink="/" present="Your Attendence" todayclasslink="/" todayclass="Join Today's Class" joincrate="Join New Class" joincratelink="/" />
    <div class="m-3">
      <h1>Your All Classes</h1>
        <x-cardclass cardimg="https://i.ibb.co/sRQYYtC/image.png" cardtitle="Card Title" cardtext="This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer." lastupdate="Last updated 3 mins ago" classlink="/"/>
    </div>
@endsection
