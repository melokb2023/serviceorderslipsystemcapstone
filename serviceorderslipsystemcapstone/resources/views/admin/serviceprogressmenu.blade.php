@include('layouts.adminnavigation')
<x-app-layout>
 

  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;">
                    
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br> 
               
             
               <h1>
               
               CompuSource COMPUTER CENTER

            </h1>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <style>
h1{
  font-family:'Century Gothic';
}
.button2 {
  border: none;
  color: white;
  text-decoration: none;
  display: inline-block;
  padding: 15px 32px;
  font-weight:bold;
  font-family:'Century Gothic';
  background-color:green;
}

.button {
  border: none;
  color: white;
  text-decoration: none;
  display: inline-block;
  padding: 15px 32px;
  font-weight:bold;
  font-family:'Century Gothic';
  background-color:blue;
}
h1{
  text-align:center;
  font-weight:bold;
  font-size:35px;
  color:white;
}

</style>
                <a class="button2" href="{{ route('serviceprogress') }}">
                        Service Progress Data
</a>
                <a class="button" href="{{ route('add-serviceprogress') }}">
                        Add Service Progress
</a>
                  
</x-app-layout>
