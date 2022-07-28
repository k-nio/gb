<?php
$add = filter_input(INPUT_POST,'adicionar' );
if($add){
    $id_produto = filter_input(INPUT_POST,'id_produto');
    $produto = filter_input(INPUT_POST,'produto');
    $versao = filter_input(INPUT_POST,'versao');
    $quantidade = filter_input(INPUT_POST,'quantidade');
    echo "$id_produto,$produto,$versao,$quantidade";
}

?>
<form action="" method="post">
    <input type="text" name="id_produto" id="id_produto" value="">
    <input type="text" name="produto" placeholder="produto" class="input-color" id="input-color" value="">
    <ul class="list-colors"></ul>
    <input type="text" name="versao" id="versao" value="">
    <input type="text" name="quantidade" id="quantidade" value="">
    <input type="submit" name="adicionar" id="bt" value="Adicionar">
</form>
<script>
    const colors = [
  {
    id: 1,
    name: 'Vermelho',
    hexColor: '#f00'
  },
  {
    id: 2,
    name: 'Vermelhoclaro',
    hexColor: '#a83632'
  },
  {
    id: 3,
    name: 'Azul',
    hexColor: '#00f'
  },
  {
    id: 4,
    name: 'Verde',
    hexColor: '#14dba6'
  }
]

const input = document.querySelector('.input-color')
const list  = document.querySelector('.list-colors')

const onKeyUp = (event) => {
  const minimumChars = 1
  let selectedColors = ''

  if (event.target.value.length >= minimumChars) {

    colors.map((color) => {
      if (color.name.toLocaleLowerCase().includes(event.target.value.toLocaleLowerCase())) {
        selectedColors += `<li  onclick="id()">${color.name}</li>`
        function id(){
    document.getElementByclass('id_produto').value='a';
    document.getElementById('input-color').value='b';
}
      }
    })

  } else {
    list.innerHTML = ''
  }

  list.innerHTML = selectedColors

  const dataColors = document.querySelectorAll('[data-color]')

  const onClick = (event) => {
    const body = document.querySelector('body')

    body.style.backgroundColor = event.target.dataset.color
  }

  Array.from(dataColors).map((li) => {
    li.addEventListener('click', onClick)
  })
}

input.addEventListener('keyup', onKeyUp);


</script>