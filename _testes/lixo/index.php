  <?php
      
        ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                text-align: center;
                font-size: 20px;
            }
            section{
                width: 100%;
                height: 100vh;
                border: 1px #003333 solid;
                overflow: scroll;
            }
            table{
                width:500px;
                height:350px;
                margin:80px auto;
                text-align:center;
                border: 1px #ccc solid;
            }

            .campo-input{
                height: 40px;
                width: 350px;   
                border: 2px #194574 solid;
                border-radius: 15px;
                background-color: #fff;
                margin-top: 5px;
            }
            .bt{
                height: 40px;
                width: 350px;
                background-color: #194574;
                color: #fff;
                border: none;
                margin-top: 5px;
            }
           @media only screen and (max-width: 900px) {
                *{
                
                font-size: 80px;
            }
            section{
                width: 100%;
                height: 100vh;
                border: 1px #003333 solid;

            }
           
            table{
                width:900px;
                height:auto;
                margin:80px auto;
                
            }

            .campo-input{
                height: 120px;
                width: 880px;
                margin-top: 25px;
            }
            .bt{
                width: calc(100% - 4px);
                
                height: 120px;
                margin-top: 20px;
            }
            }
            @media only screen and (max-width: 600px) {
           
                 *{
                
                font-size: 80px;
            }
            section{
                width: 100%;
                height: 100vh;
                border: 1px #003333 solid;

            }
           
            table{
                width:600px;
                height:auto;
                margin:80px auto;
                
            }

            .campo-input{
                height: 120px;
                width: 880px;
                margin-top: 25px;
            }
            .bt{
                width: calc(100% - 4px);
                
                height: 120px;
                margin-top: 20px;
            }
            }
        </style>
    </head>
    <body>
        <?php
         $confirmar = filter_input(INPUT_POST,'calcular');
       if($confirmar){
           include './_resultado.php';  
       }
       ?>
        <section>
            
            <form action="" method="post" id="mod">
            <table>
                <tr><th>Concentração Inicial</th></tr>
                <tr><td><input type="" name="var1" value="" class="campo-input"></td></tr>
                <tr><th>Volume Inicial</th></tr>
                <tr><td><input type="" name="var2" value="" class="campo-input"></td></tr>
                <tr><th>Produto</th></tr>
                
                <tr><td>
           <select class="campo-input" name="var3">
                <option value="27">Lauril</option>
                <option value="70">Álcool</option>
                <option value="2.25">Água Sanitária</option>
            </select>
           </td></tr>
                
                <tr><td><input type="submit" name="calcular" value="Calcular" class="bt"></td></tr>
            </table>
        </form> 
        </section>
        
        
      
    </body>
</html>
