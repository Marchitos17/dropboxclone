<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Drive Elegante - Visualizzazione Avanzata</title>
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
        .container {
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
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px;
            width: 100%;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .new-button:hover {
            background-color: #155bb5;
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
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
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
    </style>
</head>
<body>
    <!-- Intestazione -->
    <header>
        <div class="header-left">
            <h1>Il mio Drive</h1>
        </div>
        <div class="header-center">
            <input type="text" placeholder="Cerca nel Drive" class="search-bar">
        </div>
        <div class="header-right">
            <button class="icon-button">🔄</button>
            <button class="icon-button">⚙️</button>
            <button class="icon-button">🔔</button>
            <button class="icon-button">👤</button>
        </div>
    </header>

    <div class="container">
        <!-- Barra laterale -->
        <aside class="sidebar">
            <button class="new-button">+ Nuovo</button>
            <ul>
                <li><a href="#">📁 Il mio Drive</a></li>
                <li><a href="#">👥 Condivisi</a></li>
                <li><a href="#">⏱️ Recenti</a></li>
                <li><a href="#">🌟 Speciali</a></li>
                <li><a href="#">🗑️ Cestino</a></li>
            </ul>
        </aside>

        <!-- Area file -->
        <main class="file-area">
            <div class="toolbar">
                <button id="gridViewBtn" class="toolbar-button">Visualizzazione a griglia</button>
                <button id="listViewBtn" class="toolbar-button">Visualizzazione a elenco</button>
            </div>
            <div id="fileGrid" class="file-grid">
                <div class="file-grid-item">
                    <div class="file-icon">📁</div>
                    <div>Progetto A</div>
                </div>
                <div class="file-grid-item">
                    <div class="file-icon">📄</div>
                    <div>Documento.pdf</div>
                </div>
                <div class="file-grid-item">
                    <div class="file-icon">📄</div>
                    <div>Report.docx</div>
                </div>
                <div class="file-grid-item">
                    <div class="file-icon">📁</div>
                    <div>Immagini</div>
                </div>
                <div class="file-grid-item">
                    <div class="file-icon">📄</div>
                    <div>Appunti.txt</div>
                </div>
            </div>
            <div id="fileList" class="file-list">
                <div class="file-list-header">
                    <div class="file-list-header-item">Nome</div>
                    <div class="file-list-header-item">Ultima modifica</div>
                    <div class="file-list-header-item">Dimensione</div>
                </div>
                <div class="file-list-item">
                    <div class="file-item">Progetto A</div>
                    <div class="file-item">10/10/2024</div>
                    <div class="file-item">—</div>
                </div>
                <div class="file-list-item">
                    <div class="file-item">Documento.pdf</div>
                    <div class="file-item">12/10/2024</div>
                    <div class="file-item">1.2 MB</div>
                </div>
                <div class="file-list-item">
                    <div class="file-item">Report.docx</div>
                    <div class="file-item">14/10/2024</div>
                    <div class="file-item">300 KB</div>
                </div>
                <div class="file-list-item">
                    <div class="file-item">Immagini</div>
                    <div class="file-item">08/10/2024</div>
                    <div class="file-item">—</div>
                </div>
                <div class="file-list-item">
                    <div class="file-item">Appunti.txt</div>
                    <div class="file-item">11/10/2024</div>
                    <div class="file-item">12 KB</div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Funzioni per cambiare la visualizzazione
        const gridViewBtn = document.getElementById('gridViewBtn');
        const listViewBtn = document.getElementById('listViewBtn');
        const fileGrid = document.getElementById('fileGrid');
        const fileList = document.getElementById('fileList');

        gridViewBtn.addEventListener('click', () => {
            fileGrid.style.display = 'grid';
            fileList.style.display = 'none';
        });

        listViewBtn.addEventListener('click', () => {
            fileGrid.style.display = 'none';
            fileList.style.display = 'block';
        });

        // Imposta la visualizzazione iniziale
        fileList.style.display = 'none'; // Inizialmente mostra la griglia
    </script>
</body>
</html>
