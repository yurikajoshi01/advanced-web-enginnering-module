@extends('layouts.app')

@section('content')
<hr/>
        <h2>ADD NEW CD PRODUCT</h2>
        <form action="/products" method="post">
        @csrf
        <div>
        <label for="producttype">Product Type:</label>
          <select id="producttype" name="producttype">
                <option value="1">Book</option>
                <option value="2">CD</option>
                <option value="3">Game</option>
          </select> 
        <br />
        </div>
        

        <div>
        <label for = "artist">Artist:</label>
        <input type = "text" id = "artist" name = "artist">
        <br/>
        </div>
        

        <div>
        <label for = "title">Title:</label>
        <input type = "text" id = "title" name = "title">
        <br/>
        </div>
        

        <div>
        <label for = "price">Price:</label>
        <input type = "text" id = "price" name = "price">
        <br/>
        </div>
        

        <div>
        <input type = "submit" value = "Submit">
        </form>
        </div>
        
@endsection