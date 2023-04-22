<div class="product">
    <h2>iPhone</h2>


    <form>
        <label for="color">Color:</label>
        <select id="color" name="color">
            <option value="White">White</option>
            <option value="Rose">Rose</option>
            <option value="Blue">Blue</option>
            <option value="Black">Black</option>
            <option value="Red">Red</option>
        </select>

        <label for="model">Model:</label>
        <select id="model" name="model">
            <option value="model1" data-price="1,199.99">iPhone-12-pro </option>
            <option value="model2" data-price="1,299.99">iPhone-12-Pro-Max</option>
            <option value="model3" data-price="899.99">iPhone-12</option>
            <option value="model4" data-price="999.99">iPhone-12-Plue</option>
        </select>

        <label for="size">GB Size:</label>
        <select id="size" name="size">
            <option value="128gb" data-price="1,199.99">128GB</option>
            <option value="256gb" data-price="1,299.99">256GB</option>

        </select>

        <div id="price">Price: $1,299.99</div>

        <button type="submit">Purchase

        </button>

    </form>
</div>

<script>
    // Get the select element for GB size
    var select = document.getElementById("size");

    // Listen for changes to the selected GB size
    select.addEventListener("change", function () {
        // Get the selected option element
        var option = select.options[select.selectedIndex];
        // Get the price from the data-price attribute
        var price = option.getAttribute("data-price");
        // Update the displayed price
        document.getElementById("price").textContent = "Price: $" + price;
    });
</script>