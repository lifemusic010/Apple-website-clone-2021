<div class="product">
         <h2>Mac</h2>
         
       
         <form>
           <label for="color">Color:</label>
           <select id="color" name="color">
             <option value="White">White</option>
             <option value="Rose">Rose</option>
             <option value="Blue">Blue</option>
           </select>
       
           
           </select>
       
           <label for="model">Model:</label>
           <select id="model" name="model">
             <option value="model1" data-price="1,299.99">Mac</option>
             <option value="model2" data-price="1,999.99">iMac </option>
         
           </select>
           
           <label for="size">GB Size:</label>
           <select id="size" name="size">
             <option value="54gb" data-price="1,299.99">500GB</option>
             <option value="128gb" data-price="1,999.99">1TB</option>
         
           </select>
           
           <div id="price">Price: $1,299.99</div>
           
           <button type="submit">Add to Cart</button>
           
         </form>
       </div>
       
       <script>
         // Get the select element for GB size
         var select = document.getElementById("size");
       
         // Listen for changes to the selected GB size
         select.addEventListener("change", function() {
           // Get the selected option element
           var option = select.options[select.selectedIndex];
           // Get the price from the data-price attribute
           var price = option.getAttribute("data-price");
           // Update the displayed price
           document.getElementById("price").textContent = "Price: $" + price;
         });
       </script>
       