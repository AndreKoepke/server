<?php
/*
 * StuReSy - Student Response System
 * Copyright (C) 2012-2014  StuReSy-Team
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


$app = new Application();

$app->handleCookiesAndInitContent();

include_once 'customize/header.php';

echo "<body ". $app->content->modifiedBodyValues() .">";

include_once 'customize/prebody.php';
?>
<?php $app->display();?>
<?php include_once "customize/footer.php"; ?>
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<?php $js = $app->content->additionalJavascript(); if($js !== false) echo "<script type=\"text/javascript\">".$js."</script>"?>
</body>
</html>
<?php 


class Application 
{
    public $content;
    private $user_id_cookie;
    
    function __construct()
    {   
    }
    function __destruct()
    {
            
    }
    
    function handleCookiesAndInitContent()
    {
        include_once 'functions.php';
        $this->user_id_cookie = get_id_cookie();
        
        include_once 'Content.php';
        $this->content = new Content($this->user_id_cookie);
        $this->content->handleCookies();
    }
    
    function display()
    {
        $this->content->display();
    }
    
}




?>