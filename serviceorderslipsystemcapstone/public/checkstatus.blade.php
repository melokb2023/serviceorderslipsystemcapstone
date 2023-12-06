<!-- public/checkstatus.blade.php -->

<!-- Your existing content -->

<form method="get" action="{{ route('checkstatus.index') }}">
    @csrf
    <label for="reference_number">Enter Reference Code:</label>
    <input type="text" name="reference_number" id="reference_number" required>
    <button type="submit">Check Status</button>
</form>

<!-- Display the status -->
<p>Status: {{ $status }}</p>