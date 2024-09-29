<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->

    <h1>Add new User</h1>
    {{session('message')}}

    <!-- {{session()->reflash}}  used to retain the flash session-->
     <!-- {{session()->keep(['message'])}} -->

    <form action="/add" method="post">
        @csrf
        <input type="text" name="username" placeholder="Enter username">
        <br>
        <br>
        <input type="text" name="email" placeholder="Enter User email">
        <br>
        <br>
        <input type="text name="phone" placeholder="Enter phone number">
        <br>
        <br>
        <button>Add new User</button>
    </form>
</div>
