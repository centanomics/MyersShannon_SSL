<div class="container mt-5">

    <div class="starter-template">
        <h1>Edit fruit</h1>

        <form action="editItem" method="POST">
            
            <?
                echo '<input type="hidden" name="id" value="'.$data['id'].'"/>';
                echo '<input type="text" name="name" placeholder="Bananas?" value="'.$data['name'].'"/>';
                echo '<input type="submit"/>';
            ?>
        </form>
    </div>

</div>