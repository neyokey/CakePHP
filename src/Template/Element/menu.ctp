<ul class="sf-menu">
    <?php
        if($menu)
        {
            foreach ($submenu as $key => $value) 
            {
                $flag[$value['menu_id']] = 1;
            }
            foreach ($menu as $key => $value) 
            {
        ?>          
            <li class="<?php if($this->request->getParam('action') == $value['action']) echo 'active'; ?>">
                <a href="<?=$this->Url->build($value["link"])?>" style="<?php if(isset($flag[$value['id']])) echo 'pointer-events: none;' ?>">
                    <?php 
                            if(strpos($value["name"],'$name')){
                                $value["name"] = substr($value["name"],  0,strpos($value["name"],'$name')).$name;
                            }
                            echo __($value["name"]);
                     ?></a>
                    <?php if(isset($flag[$value['id']]))
                        {
                            echo '<ul>';
                            foreach ($submenu as $key2 => $value2) 
                            {  
                                if($value2["menu_id"] == $value['id'])
                                {
                                    if(strpos($value2["link"],'$id'))
                                    {
                                        $value2["link"] = substr($value2["link"],  0,strpos($value2["link"],'$id')).$id;
                                    }
                    ?>
                                
                                    <li class="<?php if($this->request->getParam('action') ==$value2['action']) echo 'active'; ?>">
                                        <a href="<?=$this->Url->build($value2["link"])?>">
                                            <?php echo __($value2["name"]) ?></a>
                                    </li>  
                    <?php
                                }
                            }

                            echo '</ul>';
                        }   
                    ?>
                    
            </li>
    <?php
            }

        }
        if($lang == 'vi_VI')
        {
    ?>
    <li class="">
        <a href="<?=$this->Url->build('/home/index/1?lang=US')?>">
            <img src="<?=$this->Url->build('/img/us.png')?>"> </a>                 
    </li>
    <?php
    }
    else
    {
    ?>
    <li class="">
        <a href="<?=$this->Url->build('/home/index/1?lang=VN')?>">
            <img class="img_lang" src="<?=$this->Url->build('/img/vn.png')?>"></a>
    </li>
    <?php
    }
    ?>
</ul>