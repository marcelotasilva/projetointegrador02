<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contatos - JOB House</title>
  <link rel="stylesheet" href="./css/contact.css">
  <link rel="stylesheet" href=".css/responsivo.css">

  <style>
    body {
      background-color: #243b55;
      text-align: center;
    }

    h1 {
      color: white;
    }

    h2 {
      color: white;
    }

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      text-decoration: none;
      list-style: none;
    }

    .header {
      position: sticky;
      top: 0;
      width: 100%;
      box-shadow: 0 4px 20px hsla(207, 24%, 35%, 0.1);
      background-color: #151418;
      z-index: 1;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 30px;
    }

    .logo a {
      font-size: 24px;
      font-weight: bold;
      color: #fff;
    }

    .logo a span {
      color: #8739fa;
    }

    .menu {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .menu a {
      display: block;
      padding: 7px 15px;
      font-size: 17px;
      font-weight: 500;
      transition: 0.2s all ease-in-out;
      color: #fff;
    }

    .menu:hover a {
      opacity: 0.4;
    }

    .menu a:hover {
      opacity: 1;
      color: #fff;
    }

    .menu-icon {
      display: none;
    }

    #menu-toggle {
      display: none;
    }

    #menu-toggle:checked~.menu {
      transform: scale(1, 1);
    }

    @media only screen and (max-width: 950px) {
      .menu {
        flex-direction: column;
        background-color: #151418;
        align-items: start;
        position: absolute;
        top: 70px;
        left: 0;
        width: 100%;
        z-index: 1;
        transform: scale(1, 0);
        transform-origin: top;
        transition: transform 0.3s ease-in-out;
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
      }

      .menu a {
        margin-left: 12px;
      }

      .menu li {
        margin-bottom: 10px;
      }

      .menu-icon {
        display: block;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
      }
    }
  </style>


</head>

<body>
  <header class="header">
    <nav>
      <div class="logo">
        <a href="./index.php">JOB.<span>House</span></a>
      </div>
      <input type="checkbox" id="menu-toggle">
      <label for="menu-toggle" class="menu-icon">&#9776;</label>
      <ul class="menu">
        <li><a href="../index.php">Pagina inicial</a></li>
        <div class="dropdown">
          <button class="dropbtn">Entrar
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <li><a href="../usuario/login.php">Entrar usuario</a></li>
            <li><a href="../empresa/login_empresa.php">Entrar empresa</a></li>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Cadastro
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <li><a href="../usuario/projetocadastro.php">Cadastrar usuario</a></li>
            <li><a href="../empresa/projetocadastro_empresa.php">Cadastrar empresa</a></li>
          </div>
        </div>
        <li><a href="../usuario/projetosobre.php">Sobre</a></li>
      </ul>
    </nav>

  </header>
  <hr><br>
  <style>
    .topnav {
      background-color: #333;
      overflow: hidden;
    }

    /* .topnav{
  position: relative;
  top: 0;
  width: 100%;
  left: 0;
} */
    /* Style the links inside the navigation bar */
    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    /* Add an active class to highlight the current page */
    .active {
      background-color: #008CBA;
      color: white;
    }

    /* Hide the link that should open and close the topnav on small screens */
    .topnav .icon {
      display: none;
    }

    /* Dropdown container - needed to position the dropdown content */
    .dropdown {
      float: left;
      overflow: hidden;
    }

    /* Style the dropdown button to fit inside the topnav */
    .dropdown .dropbtn {
      font-size: 17px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    /* Style the dropdown content (hidden by default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    /* Style the links inside the dropdown */
    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    /* Add a dark background on topnav links and the dropdown button on hover */
    .topnav a:hover,
    .dropdown:hover .dropbtn {
      background-color: gray;
      color: black;
    }

    /* Add a grey background to dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Show the dropdown menu when the user moves the mouse over the dropdown button */
    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
    @media screen and (max-width: 600px) {

      .topnav a:not(:first-child),
      .dropdown .dropbtn {
        display: none;
      }

      .topnav a.icon {
        float: right;
        display: block;
      }
    }

    /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
    @media screen and (max-width: 600px) {
      .topnav.responsive {
        position: relative;
      }

      .topnav.responsive a.icon {
        position: relative;
        right: 0;
        top: 0;
      }

      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }

      .topnav.responsive .dropdown {
        float: none;
      }

      .topnav.responsive .dropdown-content {
        position: relative;
      }

      .topnav.responsive .dropdown .dropbtn {
        display: block;
        width: 100%;
        text-align: left;
      }
    }
  </style>