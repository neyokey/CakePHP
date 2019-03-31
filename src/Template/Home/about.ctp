<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <?php
                    foreach ($gioithieu as  $value) 
                    {
                        echo '<h2>'.$value['title'].'</h2> <div class="row"> <div class="grid_6">'.$value['content'].'</div><div class="grid_6">'.$value['content2'].'</div></div>';
                    }
                ?>  
            </div>
        </section>
    </main>
</div>

