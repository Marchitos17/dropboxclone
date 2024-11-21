<head><script src="/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Drive - Visualizzazione Avanzata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        
      /* Stili di base */
      body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }

        /* Intestazione */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.1);
        }

        .header-left h1 {
            font-size: 24px;
            color: #1a73e8;
        }

        .header-center {
            flex-grow: 1;
            margin: 0 20px;
        }

        .search-bar {
            width: 100%;
            padding: 10px 15px;
            border-radius: 20px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .search-bar:focus {
            border-color: #1a73e8;
            outline: none;
        }

        .header-right .icon-button {
            background: none;
            border: none;
            font-size: 20px;
            margin-left: 15px;
            cursor: pointer;
            color: #555;
        }

        /* Layout della pagina */
        .container1 {
            display: flex;
        }

        /* Barra laterale */
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
            height: 100vh;
        }

        .new-button {
            display: block;
            background-color: ;
            color: black;
            border: solid 1px black;
            border-radius: 60px;
            padding: 12px;
            width: 100%;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .new-button:hover {
            background-color: #155bb5;
            color: white;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #333;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .sidebar ul li a:hover {
            color: #1a73e8;
        }

        /* Area file */
        .file-area {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }

        /* Toolbar */
        .toolbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .toolbar-button {
            background-color: #ffffff;
            color: #5f6368;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 8px 12px;
            margin-left: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .toolbar-button:hover {
            background-color: #f0f0f0;
        }

        /* Stile della griglia */
        .file-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
        }

        .file-grid-item {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s;
        }

        .file-grid-item:hover {
            transform: translateY(-5px);
        }

        .file-icon {
            font-size: 50px; /* Icone di dimensione più grande */
        }
        /*Messaggi*/
        .rename-form {
            display: flex;
            align-items: center;
        }

        .rename-form input {
            padding: 5px;
            margin-right: 10px;
            font-size: 14px;
            width: 150px;
        }

        .rename-form button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .rename-form button:hover {
            background-color: #218838;
        }
        #loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: #f3f3f3;
        z-index: 9999;
        }
        
        /* Barra di progressione */
        #progress-bar {
        width: 0%;
        height: 100%;
        background-color: #000080;
        }
        /* Stile della lista */
        .file-list {
            display: none; /* Inizialmente nascosta */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.1);
        }

        .file-list-header {
            background-color: #f5f5f5;
            display: flex;
            font-weight: bold;
            color: #555;
        }

        .file-list-header-item {
            flex: 1;
            padding: 12px 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .file-list-item {
            display: flex;
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            transition: background-color 0.2s;
        }

        .file-list-item:hover {
            background-color: #f0f0f0;
        }

        .file-list-item div {
            flex: 1;
            color: #333;
            font-size: 16px;
        }
      img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
      }
      
      img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
      }
      </style>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
  
  </head>