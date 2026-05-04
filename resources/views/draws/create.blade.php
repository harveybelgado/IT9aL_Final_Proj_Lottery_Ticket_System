@extends('layout')

@section('content')
    <h2>Schedule Draw</h2>
    <form action="{{ route('draws.store') }}" method="POST">
        @csrf
        <div>
            <label>Draw Date</label>
            <input type="date" name="draw_date" required>
        </div>
        <button type="submit">Schedule</button>
    </form>
@endsection
