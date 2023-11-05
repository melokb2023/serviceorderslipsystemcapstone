<x-app-layout>

    <div class="py-12" style="background-color:red;width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:red;width: 100%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:red;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:red;width: 100%">
                <link rel="stylesheet" href="index.css">
               
                    <h6>Service Information</h6>                
                    <table style="border: 5px solid black;width: 100%">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Product ID</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Status</th>
                       
</tr>

<tbody>
                @foreach($ratings as $rating)
                       <tr>
                        <td>{{$rating['id']}}</td>
                        <td>{{$rating['user_id']}}</td>
                        <td>{{$rating['product_id']}}</td>
                        <td>{{$rating['review']}}</td>
                        <td>{{$rating['rating']}}</td>
                        <td>{{$rating['status']}}</td>
                       </tr>
                        @endforeach
                </tbody>
                    </table>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
