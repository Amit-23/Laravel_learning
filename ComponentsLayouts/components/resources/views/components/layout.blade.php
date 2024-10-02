<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>

<style>

    .footer{
        position: absolute;
        bottom: 0;
        background-color: skyblue;
        width: 100%;
        margin: 0;
        padding: 10px;
        text-align: center;
    }
    .header{
        display: flex;
        margin: 0;
        width: 100%;
        background-color: yellow;
    }
    .header ul {
        display: flex;
        gap: 20px;
        
    }

    li{
        list-style: none;
        text-decoration: none;

    }
    a{
        text-decoration: none;
        font-weight: 700;
    }

    .desc{
        background-color: purple;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 200px;
    }
</style>
<body>
   <div>
     <div class="header">
        <ul>
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a href="">About</a>
            </li>
            <li>
                <a href="">Login</a>
            </li>
            <li>
                <a href="">Contact</a>
            </li>
        </ul>
    </div>

    <div class="desc">
        <h1>{{$desc}}</h1>
        <h3>Sub heading for About Page</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus nemo necessitatibus, ducimus natus ipsam vero iusto officiis repellat quo temporibus.</p>
    </div>
   </div>

   <div class="footer">
    <h2>Footer page</h2>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, blanditiis.</p>
   </div>
</body>
</html>