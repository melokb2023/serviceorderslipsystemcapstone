<!-- resources/views/public/check-status.blade.php -->

<x-guest-layout>

   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Check Status
       </h2>
   </x-slot>

   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 bg-white border-b border-gray-200">
                   <form action="{{ route('public-check-status') }}" method="GET">
                       <label for="reference_number">Enter Reference Number:</label>
                       <input type="text" name="reference_number" value="{{ request('reference_number') }}" required>
                       <button type="submit">Check Status</button>
                   </form>

                   @if(isset($orderReferenceCode) && isset($status))
                       <p>Status for Order Reference Code {{ $orderReferenceCode }}: {{ $status }}</p>
                   @endif
               </div>
           </div>
       </div>
   </div>

</x-guest-layout>