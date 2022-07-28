<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    body {
      font-family: 'Montserrat';
      font-weight: 600;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    input {
      padding: 10px;
      width: 200px;
    }

    li {
      background-color: white;
      border: 1px solid black;
      padding: 10px;
      width: 200px;
    }

    li:hover {
      background-color: #eee;
      cursor: pointer;
    }
  </style>
  <title>Autocomplete</title>
</head>
<body>
  <p><label for="input-color">Digite a cor para o fundo:</label></p>
  <p>
      <input id="input-color" type="text" class="input-color" placeholder="Cor" value=""></p>

  <div>
    <ul class="list-colors"></ul>
  </div>
  <script>
      const colors = [
<?php
include '../../conection/Conection.php';
include '../../conection/Query.php';
$con = new Query();
$result = $con->pesquisar("select produto, versao, id_produto from _produto");
while ($dado = mysqli_fetch_array($result)){
    
$produto = $dado['produto'];
$id_produto = $dado['id_produto'];
$versao = $dado['versao'];

echo "
  {
    id: '$id_produto',
    name: '$produto $versao',
    hexColor: '#f00'
  },
";
}
?>

{
    id: '$id_produto',
    name: '$produto',
    versao: '$versao',
    hexColor: '#f00'
  }];
const input = document.querySelector('.input-color');
const list  = document.querySelector('.list-colors');

const onKeyUp = (event) => {
  const minimumChars = 3;
  let selectedColors = '';

  if (event.target.value.length >= minimumChars) {

    colors.map((color) => {
      if (color.name.toLocaleLowerCase().includes(event.target.value.toLocaleLowerCase())) {
        selectedColors += `<input type='text' data-color="${color.hexColor}" name='${color.id}' data-id="${color.id}" value='${color.name}'>`;
      }
    });

  } else {
    list.innerHTML = '';
  }

  list.innerHTML = selectedColors;

  const dataColors = document.querySelectorAll('[data-color]');

  const onClick = (event) => {
    const body = document.querySelector('body');

    body.style.backgroundColor = event.target.dataset.color;
  };

  Array.from(dataColors).map((li) => {
    li.addEventListener('click', onClick);
  });
};

input.addEventListener('keyup', onKeyUp);
  
  </script>
</body>
</html>