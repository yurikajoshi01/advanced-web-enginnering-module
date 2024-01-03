<form method = "get" action="{{route('search')}}">
            <label for= "producttype">ProductType: </label>
            <select name="producttype" id="producttype">
                <option disabled selected value>All</option>            
                <option value="1">Book</option>
                <option value="2">CD</option>
                <option value="3">Game</option>
            </select>

            <label for="sortOrder">Ordering: </label>
            <select name="sortOrder" id="sortOrder">
                <option disabled selected value>None</option>   
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>

            
            <label for="sortOrder">Search: </label>
            <input type="text" name="search" id="search" placeholder="Search products">
           
            <button Type="submit" class="bg-purple-400 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:bg-purple-700">Sort</button>
</form>