@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-white">Recensioni</h1>

        <table class="table table-striped table-inverse table-responsive bg-white message-style">
            <thead>
                <tr>
                    <th>N.</th>
                    <th scope="col">Data</th>
                    <th scope="col">User</th>
                    <th scope="col">Recensione</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @php
                                $carbonDate = \Illuminate\Support\Carbon::createFromFormat('Y-m-d', $review->date_fake);
                                $formattedDate = $carbonDate->format('d-m-Y');
                                echo $formattedDate;
                            @endphp
                        </td>
                        <td>{{ $review->user }}</td>
                        <td>{{ $review->text }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
