<!--

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>15パズル</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .home-screen, .game-screen {
            display: none;
        }
        .visible {
            display: block;
        }
        .grid {
            display: grid;
            gap: 5px;
        }
        .tile {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2em;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .empty {
            background-color: #ddd;
            cursor: default;
        }
        .timer {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .control-btns {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        .control-btns button, .home-screen button {
            padding: 10px 20px;
            font-size: 1.2em;
            cursor: pointer;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .retry-btn {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- ホーム画面 -->
<div class="home-screen visible" id="home-screen">
    <h1>15パズルへようこそ！</h1>
    <p>難易度を選んでください:</p>
    <button onclick="startGame(3)">Easy (3×3)</button>
    <button onclick="startGame(4)">Normal (4×4)</button>
    <button onclick="startGame(5)">Hard (5×5)</button>
</div>

<!-- ゲーム画面 -->
<div class="game-screen" id="game-screen">
    <div class="timer" id="timer">経過時間: 00:00</div>
    <div class="grid" id="puzzle">
        <!-- タイルをJavaScriptで動的に追加します -->
    </div>
    <button class="retry-btn" id="retry-btn" onclick="retry()">再挑戦</button>
    <div class="control-btns">
        <button onclick="goToHome()">ホームへ戻る</button>
    </div>
</div>

<script>
    const homeScreen = document.getElementById('home-screen');
    const gameScreen = document.getElementById('game-screen');
    const puzzle = document.getElementById('puzzle');
    const timerElement = document.getElementById('timer');
    const retryBtn = document.getElementById('retry-btn');
    let gridSize = 4;
    let tiles = [];
    let emptyTileIndex = gridSize * gridSize - 1;
    let startTime = null;
    let timerInterval = null;

    // ゲームを開始する関数
    function startGame(size) {
        gridSize = size;
        initializePuzzle();
        switchScreen('game');
    }

    // ホーム画面とゲーム画面を切り替える関数
    function switchScreen(screen) {
        if (screen === 'game') {
            homeScreen.classList.remove('visible');
            gameScreen.classList.add('visible');
        } else {
            gameScreen.classList.remove('visible');
            homeScreen.classList.add('visible');
        }
    }

    // ホーム画面へ戻る関数
    function goToHome() {
        resetTimer();
        switchScreen('home');
    }

    // 初期配置を設定する関数
    function initializePuzzle() {
        tiles = Array.from({ length: gridSize * gridSize - 1 }, (_, i) => i + 1).concat([null]);
        tiles = shuffle(tiles);
        renderPuzzle();
        resetTimer();
        retryBtn.style.display = 'none'; 
    }

    // タイマーをリセットする関数
    function resetTimer() {
        clearInterval(timerInterval);
        startTime = null;
        timerElement.textContent = "経過時間: 00:00";
    }

    // タイマーをスタートする関数
    function startTimer() {
        startTime = Date.now();
        timerInterval = setInterval(() => {
            const elapsed = Date.now() - startTime;
            const minutes = Math.floor(elapsed / 60000);
            const seconds = Math.floor((elapsed % 60000) / 1000);
            timerElement.textContent = `経過時間: ${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }, 1000);
    }

    // パズルを表示する関数
    function renderPuzzle() {
        puzzle.innerHTML = '';
        puzzle.style.gridTemplateColumns = `repeat(${gridSize}, 100px)`;
        puzzle.style.gridTemplateRows = `repeat(${gridSize}, 100px)`;
        tiles.forEach((tile, index) => {
            const tileDiv = document.createElement('div');
            tileDiv.classList.add('tile');
            if (tile === null) {
                tileDiv.classList.add('empty');
            } else {
                tileDiv.textContent = tile;
                tileDiv.addEventListener('click', () => tryMoveTile(index));
            }
            puzzle.appendChild(tileDiv);
        });
    }

    // タイルをシャッフルする関数
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    // タイルを移動するか試みる関数
    function tryMoveTile(index) {
        if (!startTime) startTimer();
        const row = Math.floor(index / gridSize);
        const col = index % gridSize;

        if (row > 0 && tiles[index - gridSize] === null) {
            moveTile(index, index - gridSize);
        } else if (row < gridSize - 1 && tiles[index + gridSize] === null) {
            moveTile(index, index + gridSize);
        } else if (col > 0 && tiles[index - 1] === null) {
            moveTile(index, index - 1);
        } else if (col < gridSize - 1 && tiles[index + 1] === null) {
            moveTile(index, index + 1);
        }
    }

    // タイルを実際に移動する関数
    function moveTile(fromIndex, toIndex) {
        [tiles[fromIndex], tiles[toIndex]] = [tiles[toIndex], tiles[fromIndex]];
        emptyTileIndex = fromIndex;
        renderPuzzle();
        checkWin();
    }

    // 勝利条件を確認する関数
    function checkWin() {
        const isComplete = tiles.slice(0, -1).every((tile, index) => tile === index + 1);
        if (isComplete) {
            clearInterval(timerInterval);
            alert(`おめでとうございます！${gridSize}×${gridSize}パズルをクリアしました！\nクリアタイム: ${timerElement.textContent.replace('経過時間: ', '')}`);
            retryBtn.style.display = 'block';
        }
    }

    // 再挑戦ボタンを押したときの関数
    function retry() {
        initializePuzzle();
    }
</script>

</body>
</html>

-->
