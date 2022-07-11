<title>Cadastrar cliente</title>

 <form method="post" action="">
            <table>
                <tr><th><h2>Cadastro de Cliente</h2></th></tr>
                <tr><th>Nome:</th></tr>
                <tr><td> <input class="campo-cliente" type="text" name="nome" value=""></td> </tr>
                <tr><th>Telefone:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="telefone" value=""> </td></tr>
                <tr><th>Email:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="email" value="">    </td></tr>
                <tr><th>Endereço:</th></tr>
                <tr><td> <textarea id="text-cliente" name="endereco" rows="5" cols="50">
Rua:
N°:
Bairro:
Cidade:
CEP:
            </textarea>  </td></tr>
               
            
                <tr>
                    <td>
                        <input type="submit" class="bt-cliente" name="cadastrar-cliente" value="Cadastrar"> 
                    </td>
                </tr>  
               
            </table> 
        </form>