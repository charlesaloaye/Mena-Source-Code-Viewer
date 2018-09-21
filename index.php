<?php include "includes/header.php";?>
<body>
<div class="form-container">
    <h1><?php echo APPNAME;?></h1>
    
    <?php 
    #Assigning Variable names for check, and web adress(Url)
    $check = $_GET["check"];
    $url   = $_GET["url"];
    #verifying that the check button was clicked
    if(isset($check)){
    #Making sure that the url input box was not empty and url starts with http:// or https://
        if(!empty($url) && substr($url,0,7)=="http://" || substr($url,0,8)=="https://"){
    #Getting the content with PHP function file_get_contents and transforming it to HTML entities
            $sourceCode = htmlentities(file_get_contents($url));
    #Printing a message for the user to know that the source code for the specified url has be shown
            echo "Source Code For ".$url;
            ?>
    <!--Displaying the source code in a textarea-->
    <textarea  class="sourceCode-box" style="overflow-x:hidden;"><?php echo $sourceCode; exit();?></textarea> 
       
       <?php }
        else{
    #Showing error message 
            echo"Wrong Url Format";
        }
    }
    ?>
    <form method="get" action="<?php $_SERVER["SCRIPT_NAME"];?>">
    <input type="text" name="url" placeholder="Enter Web Address" class="input-box">
    <button class="btn" name="check" type="submit">View Source Code</button>
    </form>
</div>
</body>
</html>