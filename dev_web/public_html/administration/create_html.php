<html>
  <head>
<!-- FontAwesome Icons -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
  rel="stylesheet"
/>
<!-- Stylesheet -->
<style>
    
      
      .options {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 15px;
      }
      .button-link {
        height: 28px;
        width: 28px;
        display: grid;
        place-items: center;
        border-radius: 3px;
        background-color: #ffffff;
        text-decoration: none; /* Ajout de la propriété pour les liens */
        outline: none;
        color: #020929;
      }
      .button-link:hover {
        background-color: #e0e9ff;
      }
      select {
        padding: 7px;
        border: 1px solid #020929;
        border-radius: 3px;
      }
      .options label,
      .options select {
        font-family: "Poppins", sans-serif;
      }
      .input-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
      }
      input[type="color"] {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: transparent;
        width: 40px;
        height: 28px;
        border: none;
        cursor: pointer;
      }
      input[type="color"]::-webkit-color-swatch {
        border-radius: 15px;
        box-shadow: 0 0 0 2px #ffffff, 0 0 0 3px #020929;
      }
      input[type="color"]::-moz-color-swatch {
        border-radius: 15px;
        box-shadow: 0 0 0 2px #ffffff, 0 0 0 3px #020929;
      }
      #text-input {
        margin-top: 10px;
        border: 1px solid #dddddd;
        padding: 20px;
        height: 50vh;
      }
</style>
    </head>
<body>
  <div class="options">
    <!-- Text Format -->
    <a href="#" id="bold" class="option-button format button-link">
      <i class="fa-solid fa-bold"></i>
    </a>
    <a href="#" id="italic" class="option-button format button-link">
      <i class="fa-solid fa-italic"></i>
    </a>
    <a href="#" id="underline" class="option-button format button-link">
      <i class="fa-solid fa-underline"></i>
    </a>
    <a href="#" id="strikethrough" class="option-button format button-link">
      <i class="fa-solid fa-strikethrough"></i>
    </a>
    <a href="#" id="superscript" class="option-button script button-link">
      <i class="fa-solid fa-superscript"></i>
    </a>
    <a href="#" id="subscript" class="option-button script button-link">
      <i class="fa-solid fa-subscript"></i>
    </a>

    <!-- List -->
    <a href="#" id="insertOrderedList" class="option-button button-link">
      <i class="fa-solid fa-list-ol"></i>
    </a>
    <a href="#" id="insertUnorderedList" class="option-button button-link">
      <i class="fa-solid fa-list"></i>
    </a>

    <!-- Undo/Redo -->
    <a href="#" id="undo" class="option-button button-link">
      <i class="fa-solid fa-rotate-left"></i>
    </a>
    <a href="#" id="redo" class="option-button button-link">
      <i class="fa-solid fa-rotate-right"></i>
    </a>

    <!-- Link -->
    <a href="#" id="createLink" class="adv-option-button button-link">
      <i class="fa fa-link"></i>
    </a>
    <a href="#" id="unlink" class="option-button button-link">
      <i class="fa fa-unlink"></i>
    </a>

    <!-- Alignment -->
    <a href="#" id="justifyLeft" class="option-button align button-link">
      <i class="fa-solid fa-align-left"></i>
    </a>
    <a href="#" id="justifyCenter" class="option-button align button-link">
      <i class="fa-solid fa-align-center"></i>
    </a>
    <a href="#" id="justifyRight" class="option-button align button-link">
      <i class="fa-solid fa-align-right"></i>
    </a>
    <a href="#" id="justifyFull" class="option-button align button-link">
      <i class="fa-solid fa-align-justify"></i>
    </a>
    <a href="#" id="indent" class="option-button spacing button-link">
      <i class="fa-solid fa-indent"></i>
    </a>
    <a href="#" id="outdent" class="option-button spacing button-link">
      <i class="fa-solid fa-outdent"></i>
    </a>

    <!-- Headings -->
    <select id="formatBlock" class="adv-option-button">
      <option value=""></option>
      <option value="H1">H1</option>
      <option value="H2">H2</option>
      <option value="H3">H3</option>
      <option value="H4">H4</option>
      <option value="H5">H5</option>
      <option value="H6">H6</option>
    </select>

    <!-- Font -->
    <select id="fontName" class="adv-option-button"></select>
    <select id="fontSize" class="adv-option-button"></select>

    <!-- Color -->
    <div class="input-wrapper">
      <input type="color" id="foreColor" class="adv-option-button" />
      <label for="foreColor">Font Color</label>
    </div>
    <div class="input-wrapper">
      <input type="color" id="backColor" class="adv-option-button" />
      <label for="backColor">Highlight Color</label>
    </div>
  </div>
    </body>
</html>