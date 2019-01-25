<div class="container"> 

     
      <h1 class="my-4 mt-5">About Fruit</h1>

      <a href='carousels/addForm'>Add Item</a><br>
      <?
      
        foreach($data as $fruit){
          echo $fruit['name']." <a href='/carousels/edit?id=".$fruit["id"]."'>Edit </a>";
          echo "<a href='carousels/delete?id=".$fruit["id"]."'>Delete</a><br>";
        }

      ?>

</div>