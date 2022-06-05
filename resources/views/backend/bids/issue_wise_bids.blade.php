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
            <th>Bidder</th>
            <th>Time To Fix</th>
            <th>Send Back Date</th>
            <th>Need Spare</th>
            <th>Need Spare</th>
            <th>Possible Cost</th>
            <th>Have Existing Task</th>
            <th>Score</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>SL</th>
            <th>Alarm</th>
            <th>Bidder</th>
            <th>Time To Fix</th>
            <th>Send Back Date</th>
            <th>Need support</th>
            <th>Need Spare</th>
            <th>Possible Cost</th>
            <th>Have Existing Task</th>
            <th>Score</th>
            {{--<th>Action</th>--}}
        </tr>
    </tfoot>
    <tbody>
        @php
            $sl = 0
        @endphp
        @forelse($bids as $bid)
        <tr>
            <td>{{ ++$sl }}</td>
            <td>{{ $bid->issue->alarm }}</td>
            <td>{{ $bid->user->name }}</td>
            <td>{{ $bid->timeToFix }}</td>
            <td>{{ $bid->sendBackDate }}</td>
            <td>{{ $bid->needSupport }}</td>
            <td>{{ $bid->needSpare }}</td>
            <td>{{ $bid->possibleCost }}</td>
            <td>{{ $bid->haveExistingTask }}</td>
            <td>{{ $bid->score }}</td>
            {{--<td>
                <a href="{{ route('issues.assign', ['issue' => $bid->issue_id]) }}" class="btn btn-warning btn-sm">Assign</a>                
            </td>--}}
        </tr>
        @empty
        <p>No bids for this issue yet</p>
        @endforelse
    </tbody>
</table>
<h3>Winner Till Now: {{ $bidWinner->user->name }}</h3>
<a href="{{ route('issues.assign', ['issue' => $bid->issue_id]) }}" class="btn btn-warning btn-sm">Assign</a>


</x-backend.layouts.master>