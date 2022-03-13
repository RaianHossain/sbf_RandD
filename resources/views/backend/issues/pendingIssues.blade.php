<x-backend.layouts.master>
<x-slot name='breadCrumb'>
    <x-backend.layouts.elements.breadcrumb>
        <x-slot name="pageHeader"> Pending Issues </x-slot>

        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('issues.pending') }}">Pending Issues</a></li>

    </x-backend.layouts.elements.breadcrumb>
</x-slot>

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
            <th>Action</th>
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
            <th>Action</th>
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
            <td>
                <a href="{{ route('issues.assign', ['issue' => $issue->id]) }}" class="btn btn-warning btn-sm">Assign</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


</x-backend.layouts.master>