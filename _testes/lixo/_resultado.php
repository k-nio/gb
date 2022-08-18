  <?php
      
         $var1 = filter_input(INPUT_POST,'var1');            
         $var2 = filter_input(INPUT_POST,'var2');
         $var3 = filter_input(INPUT_POST,'var3');
         $var4 = filter_input(INPUT_POST,'var4');
         
         $resultado = (($var1*$var2)/($var3));
     
        ?>
<style>
    #mod{
        display: none;
    }
   #fx{
    color: red;
    font-size: 45px;
    margin-right: 20px;
    float: right;
}
</style>
        <section>
            <a href="" id="fx">&times;</a>
            <table>
                
                <tr><th>Concentração final</th></tr>
                <tr><td><?php echo "$resultado";?></td></tr>
                
               
            </table>
        </form> 
        </section>
        