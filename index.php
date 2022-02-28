<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>   
     <?php
       echo <<<FORM
        <form name="form1" id="form"  method="POST" enctype="multipart/form-data">
            <fieldset> 
               <legend>Тест форма</legend>   
               <label for="fio">Фио: <input type="text" name="fio" value="" id="fio" size="20" required="required"/> </label>
               <label for="city">Город: <input type="text" name="city" id="city" value="" size="20" required="required"/> </label>
               <label for="adres">Email: <input type="email" name="adres" id="adres" value="" size="20" required="required"/> </label>
               <label for="text">О себе</label>
               <textarea id="text" name="text" ></textarea>
            </fieldset> 
            <div id="but"><input type="submit" value="Ок" name="sub" /> <input type="reset" value="Очистка" name="clear" /> </div> 
        </form>
FORM;
        if(filter_input(INPUT_POST,'sub')){
             $fio= del_tags(filter_input(INPUT_POST,'fio'));
             $city=del_tags(filter_input(INPUT_POST,'city'));
             $adres=filter_var(filter_input(INPUT_POST,'adres'), FILTER_VALIDATE_EMAIL);
             $discript=del_tags(filter_input(INPUT_POST,'text'));
             echo <<<OUT
              <h2>Вы ввели:</h2>
              <h3>ФИО: $fio</h3>
              <h3>Город: $city</h3>
              <h3>Email: $adres</h3>
              <h3>О себе: $discript</h3>
OUT;
         }
        function del_tags($s_post) {
          $buf_tmp= strip_tags($s_post);
          return $buf= htmlspecialchars($buf_tmp);       
       }
        ?>
    </body>
</html>
