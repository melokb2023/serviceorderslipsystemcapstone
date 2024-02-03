@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif

@include('layouts.adminnavigation')

<x-app-layout>
    <div class="py-12" style="width: 100%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 100%;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="width: 100%">
                    <link rel="stylesheet" href="style.scss">
                    <style>
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial;
        font-size: 14px;
        line-height: 20px;
        font-weight: 400;
        color: #3b3b3b;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
        background: #2b2b2b;
    }

    @media screen and (max-width: 580px) {
        body {
            font-size: 16px;
            line-height: 22px;
        }
    }

    .wrapper {
        margin: 0 auto;
        width: 100%;
        text-align: center;
    }

    .table {
        margin: 0 auto;
        width: 100%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        display: table;
        border-collapse: collapse; /* Added border collapse */
    }

    @media screen and (max-width: 580px) {
        .table {
            display: block;
        }
    }

    .row {
        display: table-row;
        background: #f6f6f6;
    }

    .row:nth-of-type(odd) {
        background: #e9e9e9;
    }

    .row.header {
        font-weight: 900;
        color: #ffffff;
        background: #2980b9;
    }

    .row.green {
        background: #27ae60;
    }

    .row.blue {
        background: #2980b9;
    }

    @media screen and (max-width: 580px) {
        .row {
            padding: 14px 0 7px;
            display: block;
        }

        .row.header {
            padding: 0;
            height: 6px;
        }

        .row.header .cell {
            display: none;
        }

        .cell {
            margin-bottom: 10px;
        }

        .cell:before {
            margin-bottom: 3px;
            content: attr(data-title);
            min-width: 98px;
            font-size: 10px;
            line-height: 10px;
            font-weight: bold;
            text-transform: uppercase;
            color: #969696;
            display: block;
        }
    }

    .icon-container {
        margin-right: 10px;
    }

    .icon-label {
        display: block;
        margin-top: 10px;
        font-size: 12px;
        color: #888;
    }

    .cell {
        padding: 6px 12px;
        display: table-cell;
        border: 1px solid #ccc; /* Added border */
    }

    @media screen and (max-width: 580px) {
        .cell {
            padding: 2px 16px;
            display: block;
        }
    }

    button {
        align-items: center;
    }

    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 100px;
        background-color: black;
        color: white;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>

<!-- Add the form for filtering -->
<form id="filterForm" method="GET" action="{{ route('customerrating') }}" class="flex items-center justify-center space-x-4">
    @csrf
    <label for="customer_name_filter">Reviewer Name:</label>
    <input type="text" id="customer_name_filter" name="customer_name_filter" style="font-weight: bold; height: 50px;" value="{{ request('customer_name_filter') }}" placeholder="Enter Reviewer Name">
    <button type="button" class="button-green" onclick="applyFilter()">Search</button>
</form>
<br>
<br>
@if(count($customerrating) > 0)
    <div class="scrollable-container">
        <div class="table">
            <div class="row header">
                <div class="cell">Service Number</div>
                <div class="cell">Reviewer Name</div>
                <div class="cell">Assigned Staff</div>
                <div class="cell">Review</div>
                <div class="cell">Staff Performance Rating</div>
                <div class="cell">Performance Interpretation</div>
                <div class="cell">Overall Performance Rating</div>
                <div class="cell">Interpretation</div>
                <div class="cell">Options</div>
            </div>
                @foreach($customerrating as $customer)
                    <div class="row">
                        <div class="cell">{{ $customer->serviceno }}</div>
                        <div class="cell">{{ $customer->customername }}</div>
                        <div class="cell">{{ $customer->staffname }}</div>
                        <div class="cell">{{ $customer->review }}</div>
                        <div class="cell">{{ $customer->staffperformance }}</div>
                        <div class="cell">
                            @if (!empty($customer->staffperformance))
                                @switch($customer->staffperformance)
                                    @case(1)
                                        Very Poor
                                        @break
                                    @case(2)
                                        Poor
                                        @break
                                    @case(3)
                                        Average
                                        @break
                                    @case(4)
                                        Good
                                        @break
                                    @case(5)
                                        Excellent
                                        @break
                                    @default
                                        Unknown Rating
                                @endswitch
                            @else
                                No Rating
                            @endif
                        </div>
                        <div class="cell">{{ $customer->rating }}</div>
                        <div class="cell">
                            @if (!empty($customer->rating))
                                @switch($customer->rating)
                                    @case(1)
                                        Very Dissatisfied
                                        @break
                                    @case(2)
                                        Somewhat Dissatisfied
                                        @break
                                    @case(3)
                                        Neither Satisfied nor Dissatisfied
                                        @break
                                    @case(4)
                                        Somewhat Satisfied
                                        @break
                                    @case(5)
                                        Very Satisfied
                                        @break
                                    @default
                                        Unknown Rating
                                @endswitch
                            @else
                                No Rating
                            @endif
                        </div>
                        <div class="cell">
                            <a style="background-color: #f6e05e; height: 0.20rem;"
                                class="mt-4 text-black font-bold py-2 px-4 rounded mr-4"
                                href="{{ route('customerrating-show', ['cr' => $customer->ratingno]) }}"
                                title="View">
                                👁
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
    <p>No records found.</p>
@endif
</div>
</div>
</div>
</div>

<script>
function applyFilter() {
document.getElementById('filterForm').submit();
}
</script>
</x-app-layout>