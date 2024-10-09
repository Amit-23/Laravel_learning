<!-- Assigning php variables to the javascript -->

@php

$user = "Javascript";


$fruits = ['Apple','Orange','Banana'];
@endphp


<script>
    var data = @json($user);

    var fruits = @json($fruits);

    fruits.forEach(function(fruit){
        console.log(fruit);
    });
    console.log(data);
   
</script>