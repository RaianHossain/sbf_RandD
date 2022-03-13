<x-backend.layouts.master>
<x-slot name='breadCrumb'>
    <x-backend.layouts.elements.breadcrumb>
        <x-slot name="pageHeader"> done Issues </x-slot>

        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('issues.running') }}">Done Issues</a></li>

    </x-backend.layouts.elements.breadcrumb>
</x-slot>
<div class="container-fluid px-4 mt-3">
<x-backend.layouts.elements.message :message="session('message')" />
<table id="datatablesSimple">
    <thead>
        <tr>
            <th>SL</th>
            <th>Alarm</th>
            <th>History</th>
            <th>Description</th>
            <th>Steps Taken</th>
            <th>Occuring Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>SL</th>
            <th>Alarm</th>
            <th>History</th>
            <th>Description</th>
            <th>Steps Taken</th>
            <th>Occuring Date</th>
            <th>Status</th>
        </tr>
    </tfoot>
    <tbody>
        @php
            $sl = 0
        @endphp
        @foreach($issues as $issue)
        <tr>
            <td>{{ ++$sl }}</td>
            <td>{{ $issue->alarm }}</td>
            <td>{{ $issue->history }}</td>
            <td>{{ $issue->description }}</td>
            <td>{{ $issue->stepsTaken }}</td>
            <td>{{ $issue->occuringDate }}</td>
            <td>{{ $issue->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</x-backend.layouts.master>