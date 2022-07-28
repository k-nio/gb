<?php
       
 ?>
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
      <input id="input-color" type="text" class="input-color" placeholder="Cor" value="">
  </p>

  <div>
    <ul class="list-colors"></ul>
  </div>
  <script>
 const produto = [
  {
    id: 1,
    name: 'Vermelho',
    hexColor: '#f00'
  },
  {
    id: 2,
    name: 'Vermelho claro',
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
];
const input = document.querySelector('.input-color');
const list  = document.querySelector('.list-colors');

const onKeyUp = (event) => {
  const minimumChars = 1;
  let selectedColors = '';

  if (event.target.value.length >= minimumChars) {

    colors.map((color) => {
      if (color.name.toLocaleLowerCase().includes(event.target.value.toLocaleLowerCase())) {
        selectedColors += `<li data-color="${color.hexColor}" onclick=document.getElementById('input-color').value='${color.name}'>${color.name}</li>`;
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

function b1() {
      document.getElementById('input-color').value = 'joao';
      
        }; 
  </script>


