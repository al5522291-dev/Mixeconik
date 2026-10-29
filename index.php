<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Windows 7 Web Desktop</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: "Segoe UI", Arial, sans-serif;
    overflow: hidden;
    background: #0878b9;
    color: #111;
}

/* DESKTOP */

#desktop {
    width: 100vw;
    height: 100dvh;
    position: relative;
    overflow: hidden;
    background:
        radial-gradient(ellipse at 50% 75%,
        #8bd8f5 0%, #1388c2 42%, #064a86 100%);
}

/* DESKTOP ICONS */

.icon {
    width: 85px;
    min-height: 82px;
    text-align: center;
    color: white;
    text-shadow: 1px 1px 3px black;
    padding: 8px 4px;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    position: absolute;
}

.icon:hover {
    background: rgba(180, 220, 255, .25);
    border-color: rgba(255,255,255,.4);
}

.icon .emoji {
    display: block;
    font-size: 36px;
    margin-bottom: 5px;
}

.icon span:last-child {
    font-size: 12px;
}

/* TASKBAR */

#taskbar {
    height: 48px;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    padding: 4px 8px;
    gap: 8px;
    background: linear-gradient(
        to bottom,
        rgba(190,230,255,.85),
        rgba(40,100,160,.92),
        rgba(15,55,105,.96)
    );
    border-top: 1px solid #b8e4ff;
    box-shadow: 0 -2px 8px #174a76;
    z-index: 10000;
}

#startButton {
    width: 48px;
    height: 42px;
    border-radius: 50%;
    border: 2px solid #a7e8ff;
    font-size: 25px;
    cursor: pointer;
    background: radial-gradient(circle, #8affb8, #16863d 65%, #063d24);
    color: white;
    text-shadow: 1px 2px 3px #003;
    box-shadow: 0 0 8px #8bdcff;
}

#taskButtons {
    display: flex;
    gap: 4px;
    flex: 1;
    overflow: hidden;
}

.task-button {
    max-width: 150px;
    min-width: 65px;
    height: 35px;
    border: 1px solid #b8ddf8;
    border-radius: 4px;
    background: linear-gradient(#c5e8ff99, #5a9ed899);
    color: white;
    overflow: hidden;
    cursor: pointer;
    text-overflow: ellipsis;
    white-space: nowrap;
}

#clock {
    color: white;
    text-shadow: 1px 1px 2px black;
    text-align: center;
    font-size: 12px;
    min-width: 65px;
}

/* START MENU */

#startMenu {
    position: absolute;
    bottom: 48px;
    left: 5px;
    width: min(360px, 95vw);
    height: min(440px, 75dvh);
    display: none;
    background: linear-gradient(135deg, #f4f9ff, #b9d6f0);
    border: 1px solid #7db7e4;
    border-radius: 8px 8px 0 0;
    box-shadow: 0 0 20px #123;
    z-index: 9000;
    overflow: hidden;
}

.start-header {
    height: 72px;
    background: linear-gradient(#dcefff, #8dbce5);
    display: flex;
    align-items: center;
    padding: 12px;
    gap: 12px;
}

.user-avatar {
    width: 45px;
    height: 45px;
    border: 2px solid white;
    border-radius: 7px;
    background: linear-gradient(135deg, #77d7ff, #1763ab);
    display: grid;
    place-items: center;
    font-size: 27px;
}

.start-body {
    display: flex;
    height: calc(100% - 118px);
}

.start-apps {
    width: 65%;
    padding: 8px;
}

.start-apps button,
.start-side button {
    display: block;
    width: 100%;
    padding: 10px 7px;
    margin-bottom: 3px;
    border: 1px solid transparent;
    border-radius: 3px;
    background: transparent;
    text-align: left;
    cursor: pointer;
    font-size: 13px;
}

.start-apps button:hover,
.start-side button:hover {
    background: #d1eaff;
    border-color: #7ab6e8;
}

.start-side {
    width: 35%;
    padding: 8px 4px;
    background: #dceafa;
    border-left: 1px solid white;
}

.start-footer {
    height: 46px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 6px;
    background: linear-gradient(#c4def4, #78a9d5);
}

#powerButton {
    padding: 8px 16px;
    color: white;
    border: 1px solid #b5d7ff;
    border-radius: 4px;
    background: linear-gradient(#eaa15e, #b64c16);
    cursor: pointer;
}

/* APPLICATION WINDOWS */

.app-window {
    position: absolute;
    top: 12%;
    left: 15%;
    width: min(650px, 90vw);
    height: min(440px, 72dvh);
    background: #f4f8fc;
    border: 1px solid #8cb7da;
    border-radius: 7px 7px 0 0;
    box-shadow: 0 8px 25px #001a3b88;
    display: none;
    flex-direction: column;
    overflow: hidden;
}

.titlebar {
    height: 38px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 12px;
    color: #102d47;
    background: linear-gradient(#f3fbff, #b8daf2 50%, #d8ecfa);
    border-bottom: 1px solid #a0c6e5;
    cursor: move;
    user-select: none;
}

.window-controls {
    display: flex;
    align-self: stretch;
}

.window-controls button {
    width: 38px;
    border: 1px solid transparent;
    background: transparent;
    cursor: pointer;
    font-size: 16px;
}

.window-controls button:hover {
    background: #a8d9ff;
}

.window-controls .close:hover {
    background: #d83c31;
    color: white;
}

.window-content {
    padding: 16px;
    overflow: auto;
    flex: 1;
}

.menu-strip {
    padding: 7px;
    background: #eef5fc;
    border-bottom: 1px solid #d0dfed;
    font-size: 13px;
}

.file-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(95px, 1fr));
    gap: 12px;
}

.file-item {
    padding: 15px 5px;
    text-align: center;
    border: 1px solid transparent;
    cursor: pointer;
    border-radius: 4px;
}

.file-item:hover {
    background: #d8edff;
    border-color: #8bbde9;
}

.file-item .emoji {
    display: block;
    font-size: 34px;
    margin-bottom: 8px;
}

/* NOTEPAD */

#notepadText {
    width: 100%;
    height: 100%;
    resize: none;
    border: none;
    outline: none;
    font: 15px Consolas, monospace;
    background: white;
}

/* CALCULATOR */

.calc-display {
    width: 100%;
    height: 55px;
    font-size: 24px;
    text-align: right;
    margin-bottom: 10px;
    padding: 8px;
}

.calc-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 6px;
}

.calc-grid button {
    height: 45px;
    font-size: 17px;
    border: 1px solid #b5c9dc;
    background: linear-gradient(white, #d8e8f7);
    cursor: pointer;
    border-radius: 4px;
}

/* CONTROL PANEL */

.settings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
    gap: 10px;
}

.setting-card {
    background: white;
    border: 1px solid #c4d8e9;
    padding: 14px;
    border-radius: 4px;
}

.setting-card strong {
    display: block;
    margin-bottom: 8px;
}

.setting-card button {
    padding: 6px 9px;
    cursor: pointer;
}

/* BROWSER */

.browser-bar {
    display: flex;
    gap: 5px;
    padding: 8px;
    background: #e7f0fa;
}

.browser-bar input {
    flex: 1;
    min-width: 0;
    padding: 7px;
}

.browser-bar button {
    padding: 7px 12px;
    cursor: pointer;
}

.browser-page {
    background: white;
    min-height: 100%;
    padding: 20px;
}

.small {
    font-size: 12px;
    color: #506579;
}

@media (max-width: 500px) {
    .app-window {
        left: 3%;
        width: 94%;
        top: 8%;
        height: 78dvh;
    }

    .icon {
        width: 76px;
    }

    #taskbar {
        gap: 5px;
        padding: 3px;
    }
}
</style>
</head>

<body>

<div id="desktop">

    <div class="icon" style="top:12px;left:8px"
         ondblclick="openApp('computer')"
         onclick="selectIcon(this)">
        <span class="emoji">💻</span>
        <span>Computer</span>
    </div>

    <div class="icon" style="top:105px;left:8px"
         ondblclick="openApp('control')"
         onclick="selectIcon(this)">
        <span class="emoji">⚙️</span>
        <span>Control Panel</span>
    </div>

    <div class="icon" style="top:198px;left:8px"
         ondblclick="openApp('notepad')"
         onclick="selectIcon(this)">
        <span class="emoji">📝</span>
        <span>Notepad</span>
    </div>

    <div class="icon" style="top:291px;left:8px"
         ondblclick="openApp('calculator')"
         onclick="selectIcon(this)">
        <span class="emoji">🧮</span>
        <span>Calculator</span>
    </div>

    <div class="icon" style="top:384px;left:8px"
         ondblclick="openApp('browser')"
         onclick="selectIcon(this)">
        <span class="emoji">🌐</span>
        <span>Internet</span>
    </div>

    <div class="icon" style="top:477px;left:8px"
         ondblclick="openApp('recycle')"
         onclick="selectIcon(this)">
        <span class="emoji">🗑️</span>
        <span>Recycle Bin</span>
    </div>

    <!-- COMPUTER WINDOW -->

    <div class="app-window" id="computer">
        <div class="titlebar">
            <span>💻 Computer</span>
            <div class="window-controls">
                <button onclick="minimizeApp('computer')">−</button>
                <button onclick="maximizeApp('computer')">□</button>
                <button class="close" onclick="closeApp('computer')">×</button>
            </div>
        </div>

        <div class="menu-strip">
            Organize　System properties　Uninstall or change a program
        </div>

        <div class="window-content">
            <h3>Computer</h3>

            <h4>Hard Disk Drives</h4>

            <div class="file-grid">
                <div class="file-item"
                     onclick="showMessage('This is a simulated C drive.')">
                    <span class="emoji">💽</span>
                    Local Disk (C:)
                </div>

                <div class="file-item"
                     onclick="showMessage('This is a simulated D drive.')">
                    <span class="emoji">💽</span>
                    Local Disk (D:)
                </div>

                <div class="file-item"
                     onclick="showMessage('No removable drive is connected to this demo.')">
                    <span class="emoji">💿</span>
                    DVD Drive
                </div>
            </div>

            <p class="small">
                This is a simulated computer window. It does not access
                your actual computer drives.
            </p>
        </div>
    </div>

    <!-- CONTROL PANEL -->

    <div class="app-window" id="control">
        <div class="titlebar">
            <span>⚙️ Control Panel</span>
            <div class="window-controls">
                <button onclick="minimizeApp('control')">−</button>
                <button onclick="maximizeApp('control')">□</button>
                <button class="close" onclick="closeApp('control')">×</button>
            </div>
        </div>

        <div class="window-content">
            <h2>Adjust your computer's settings</h2>

            <div class="settings-grid">

                <div class="setting-card">
                    <strong>🖥️ Display</strong>
                    <button onclick="changeWallpaper()">
                        Change wallpaper
                    </button>
                </div>

                <div class="setting-card">
                    <strong>🔊 Sound</strong>
                    <button onclick="showMessage('Browser sound settings depend on your device.')">
                        Sound settings
                    </button>
                </div>

                <div class="setting-card">
                    <strong>🌐 Network</strong>
                    <button onclick="openApp('browser')">
                        Open Internet
                    </button>
                </div>

                <div class="setting-card">
                    <strong>🕒 Date and Time</strong>
                    <button onclick="showMessage('Current time: ' + new Date().toLocaleString())">
                        View clock
                    </button>
                </div>

                <div class="setting-card">
                    <strong>👤 User Accounts</strong>
                    <button onclick="showMessage('This demo does not manage real Windows accounts.')">
                        Manage users
                    </button>
                </div>

                <div class="setting-card">
                    <strong>ℹ️ System</strong>
                    <button onclick="showMessage('Mixeconik Web Desktop\\nBrowser-based desktop simulation.')">
                        System information
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- NOTEPAD -->

    <div class="app-window" id="notepad">
        <div class="titlebar">
            <span>📝 Notepad</span>
            <div class="window-controls">
                <button onclick="minimizeApp('notepad')">−</button>
                <button onclick="maximizeApp('notepad')">□</button>
                <button class="close" onclick="closeApp('notepad')">×</button>
            </div>
        </div>

        <div class="menu-strip">
            <button onclick="saveNote()">Save</button>
            <button onclick="clearNote()">Clear</button>
        </div>

        <div class="window-content" style="padding:0">
            <textarea id="notepadText"
                placeholder="Type your notes here..."></textarea>
        </div>
    </div>

    <!-- CALCULATOR -->

    <div class="app-window" id="calculator">
        <div class="titlebar">
            <span>🧮 Calculator</span>
            <div class="window-controls">
                <button onclick="minimizeApp('calculator')">−</button>
                <button onclick="maximizeApp('calculator')">□</button>
                <button class="close" onclick="closeApp('calculator')">×</button>
            </div>
        </div>

        <div class="window-content">
            <input id="calcDisplay" class="calc-display"
                   value="0" readonly>

            <div class="calc-grid">
                <button onclick="calcClear()">C</button>
                <button onclick="calcAdd('(')">(</button>
                <button onclick="calcAdd(')')">)</button>
                <button onclick="calcAdd('/')">÷</button>

                <button onclick="calcAdd('7')">7</button>
                <button onclick="calcAdd('8')">8</button>
                <button onclick="calcAdd('9')">9</button>
                <button onclick="calcAdd('*')">×</button>

                <button onclick="calcAdd('4')">4</button>
                <button onclick="calcAdd('5')">5</button>
                <button onclick="calcAdd('6')">6</button>
                <button onclick="calcAdd('-')">−</button>

                <button onclick="calcAdd('1')">1</button>
                <button onclick="calcAdd('2')">2</button>
                <button onclick="calcAdd('3')">3</button>
                <button onclick="calcAdd('+')">+</button>

                <button onclick="calcAdd('0')">0</button>
                <button onclick="calcAdd('.')">.</button>
                <button onclick="calcBack()">⌫</button>
                <button onclick="calcResult()">=</button>
            </div>
        </div>
    </div>

    <!-- BROWSER -->

    <div class="app-window" id="browser">
        <div class="titlebar">
            <span>🌐 Web Browser</span>
            <div class="window-controls">
                <button onclick="minimizeApp('browser')">−</button>
                <button onclick="maximizeApp('browser')">□</button>
                <button class="close" onclick="closeApp('browser')">×</button>
            </div>
        </div>

        <div class="browser-bar">
            <input id="browserAddress"
                   value="https://example.com"
                   placeholder="Enter website address">

            <button onclick="visitWebsite()">Go</button>
        </div>

        <div class="window-content" style="padding:0">
            <div class="browser-page">
                <h2>Internet Browser</h2>
                <p>
                    Enter a website address and click Go to open it
                    in a new browser tab.
                </p>
                <p class="small">
                    Some websites cannot be displayed inside another
                    website. Internet access is required.
                </p>
            </div>
        </div>
    </div>

    <!-- RECYCLE BIN -->

    <div class="app-window" id="recycle">
        <div class="titlebar">
            <span>🗑️ Recycle Bin</span>
            <div class="window-controls">
                <button onclick="minimizeApp('recycle')">−</button>
                <button onclick="maximizeApp('recycle')">□</button>
                <button class="close" onclick="closeApp('recycle')">×</button>
            </div>
        </div>

        <div class="window-content">
            <h2>Recycle Bin</h2>
            <p>The Recycle Bin is empty.</p>
            <p class="small">
                This demo does not delete or recover real computer files.
            </p>
        </div>
    </div>

    <!-- START MENU -->

    <div id="startMenu">

        <div class="start-header">
            <div class="user-avatar">👤</div>
            <div>
                <strong>Mixeconik User</strong><br>
                <span class="small">Web Desktop</span>
            </div>
        </div>

        <div class="start-body">

            <div class="start-apps">
                <button onclick="openApp('browser')">🌐 Internet</button>
                <button onclick="openApp('notepad')">📝 Notepad</button>
                <button onclick="openApp('calculator')">🧮 Calculator</button>
                <button onclick="openApp('computer')">💻 Computer</button>
                <button onclick="openApp('recycle')">🗑️ Recycle Bin</button>
            </div>

            <div class="start-side">
                <button onclick="openApp('computer')">Computer</button>
                <button onclick="openApp('control')">Control Panel</button>
                <button onclick="showMessage('Help: Open applications using their icons.')">
                    Help and Support
                </button>
            </div>

        </div>

        <div class="start-footer">
            <button id="powerButton" onclick="powerAction()">
                Shut down
            </button>
        </div>

    </div>

    <!-- TASKBAR -->

    <div id="taskbar">

        <button id="startButton" onclick="toggleStart()"
                title="Start">⊞</button>

        <div id="taskButtons"></div>

        <div id="clock"></div>

    </div>

</div>

<script>
const appNames = {
    computer: "Computer",
    control: "Control Panel",
    notepad: "Notepad",
    calculator: "Calculator",
    browser: "Internet",
    recycle: "Recycle Bin"
};

let topZ = 100;
let currentCalc = "";
let calcFinished = false;
let wallpaperIndex = 0;

const windows = document.querySelectorAll(".app-window");

/* ICON SELECTION */

function selectIcon(icon) {
    document.querySelectorAll(".icon").forEach(item => {
        item.style.background = "";
    });

    icon.style.background = "rgba(180,220,255,.35)";
}

/* START MENU */

function toggleStart() {
    const menu = document.getElementById("startMenu");

    menu.style.display =
        menu.style.display === "block" ? "none" : "block";
}

document.addEventListener("click", function(event) {
    const menu = document.getElementById("startMenu");
    const start = document.getElementById("startButton");

    if (!menu.contains(event.target) &&
        !start.contains(event.target) &&
        !event.target.closest(".start-apps") &&
        !event.target.closest(".start-side")) {
        menu.style.display = "none";
    }
});

/* OPEN APPLICATION */

function openApp(id) {
    const win = document.getElementById(id);

    if (!win) return;

    win.style.display = "flex";
    win.style.zIndex = ++topZ;

    document.getElementById("startMenu").style.display = "none";

    if (id === "notepad") loadNote();

    createTaskButton(id);
}

/* CLOSE APPLICATION */

function closeApp(id) {
    const win = document.getElementById(id);

    win.style.display = "none";

    const button = document.getElementById("task-" + id);

    if (button) button.remove();
}

/* MINIMIZE */

function minimizeApp(id) {
    document.getElementById(id).style.display = "none";
}

/* MAXIMIZE AND RESTORE */

function maximizeApp(id) {
    const win = document.getElementById(id);

    if (win.dataset.maximized === "true") {
        win.style.top = win.dataset.oldTop;
        win.style.left = win.dataset.oldLeft;
        win.style.width = win.dataset.oldWidth;
        win.style.height = win.dataset.oldHeight;

        win.dataset.maximized = "false";
    } else {
        win.dataset.oldTop = win.style.top || win.offsetTop + "px";
        win.dataset.oldLeft = win.style.left || win.offsetLeft + "px";
        win.dataset.oldWidth = win.style.width || win.offsetWidth + "px";
        win.dataset.oldHeight = win.style.height || win.offsetHeight + "px";

        win.style.top = "0";
        win.style.left = "0";
        win.style.width = "100%";
        win.style.height = "calc(100% - 48px)";

        win.dataset.maximized = "true";
    }

    win.style.zIndex = ++topZ;
}

/* TASKBAR APPLICATION BUTTONS */

function createTaskButton(id) {
    const container = document.getElementById("taskButtons");

    let button = document.getElementById("task-" + id);

    if (!button) {
        button = document.createElement("button");
        button.id = "task-" + id;
        button.className = "task-button";
        button.textContent = appNames[id];

        button.onclick = function() {
            const win = document.getElementById(id);

            if (win.style.display === "none") {
                win.style.display = "flex";
                win.style.zIndex = ++topZ;
            } else if (win.style.zIndex == topZ) {
                win.style.display = "none";
            } else {
                win.style.zIndex = ++topZ;
            }
        };

        container.appendChild(button);
    }
}

/* DRAG WINDOWS */

document.querySelectorAll(".titlebar").forEach(bar => {
    let dragging = false;
    let startX = 0;
    let startY = 0;
    let startLeft = 0;
    let startTop = 0;
    const win = bar.parentElement;

    bar.addEventListener("pointerdown", function(e) {
        if (e.target.closest("button")) return;
        if (win.dataset.maximized === "true") return;

        dragging = true;
        startX = e.clientX;
        startY = e.clientY;
        startLeft = win.offsetLeft;
        startTop = win.offsetTop;

        win.style.zIndex = ++topZ;

        bar.setPointerCapture(e.pointerId);
    });

    bar.addEventListener("pointermove", function(e) {
        if (!dragging) return;

        win.style.left = Math.max(
            0, Math.min(
                window.innerWidth - 80,
                startLeft + e.clientX - startX
            )
        ) + "px";

        win.style.top = Math.max(
            0, Math.min(
                window.innerHeight - 100,
                startTop + e.clientY - startY
            )
        ) + "px";
    });

    bar.addEventListener("pointerup", function() {
        dragging = false;
    });

    bar.addEventListener("pointercancel", function() {
        dragging = false;
    });
});

/* NOTEPAD SAVE */

function saveNote() {
    const text = document.getElementById("notepadText").value;

    try {
        localStorage.setItem("mixeconik_note", text);
        showMessage("Note saved in this browser.");
    } catch (error) {
        showMessage("Could not save the note.");
    }
}

function loadNote() {
    try {
        const saved = localStorage.getItem("mixeconik_note");

        if (saved !== null) {
            document.getElementById("notepadText").value = saved;
        }
    } catch (error) {
        // Local storage may be unavailable.
    }
}

function clearNote() {
    if (confirm("Clear all text from Notepad?")) {
        document.getElementById("notepadText").value = "";
    }
}

/* CALCULATOR */

function calcAdd(value) {
    if (calcFinished && /[0-9.(]/.test(value)) {
        currentCalc = "";
    }

    calcFinished = false;

    currentCalc += value;

    document.getElementById("calcDisplay").value =
        currentCalc || "0";
}

function calcClear() {
    currentCalc = "";
    calcFinished = false;
    document.getElementById("calcDisplay").value = "0";
}

function calcBack() {
    currentCalc = currentCalc.slice(0, -1);

    document.getElementById("calcDisplay").value =
        currentCalc || "0";
}

function calcResult() {
    try {
        if (!currentCalc ||
            !/^[0-9+\-*/().\s]+$/.test(currentCalc)) {
            throw new Error("Invalid expression");
        }

        const result = Function(
            '"use strict"; return (' + currentCalc + ')'
        )();

        if (!Number.isFinite(result)) {
            throw new Error("Invalid result");
        }

        currentCalc = String(result);
        document.getElementById("calcDisplay").value = currentCalc;
        calcFinished = true;

    } catch (error) {
        document.getElementById("calcDisplay").value = "Error";
        currentCalc = "";
        calcFinished = false;
    }
}

/* INTERNET BROWSER */

function visitWebsite() {
    let address =
        document.getElementById("browserAddress").value.trim();

    if (!address) {
        showMessage("Enter a website address.");
        return;
    }

    if (!/^https?:\/\//i.test(address)) {
        address = "https://" + address;
    }

    try {
        const url = new URL(address);

        if (!["http:", "https:"].includes(url.protocol)) {
            throw new Error("Invalid protocol");
        }

        window.open(url.href, "_blank", "noopener,noreferrer");

    } catch (error) {
        showMessage("Please enter a valid website address.");
    }
}

/* WALLPAPER SETTINGS */

function changeWallpaper() {
    const desktop = document.getElementById("desktop");

    const wallpapers = [
        "radial-gradient(ellipse at 50% 75%, #8bd8f5, #1388c2 45%, #064a86)",
        "linear-gradient(135deg, #163b77, #5c9bc8, #c4eaff)",
        "linear-gradient(135deg, #234d20, #65b34b, #d4f4a5)",
        "linear-gradient(135deg, #39215e, #8d6cc8, #f0d8ff)"
    ];

    wallpaperIndex = (wallpaperIndex + 1) % wallpapers.length;

    desktop.style.background = wallpapers[wallpaperIndex];

    showMessage("Desktop wallpaper changed.");
}

/* POWER BUTTON */

function powerAction() {
    const confirmed = confirm(
        "Close all desktop applications?"
    );

    if (!confirmed) return;

    windows.forEach(win => {
        win.style.display = "none";
    });

    document.getElementById("taskButtons").innerHTML = "";
    document.getElementById("startMenu").style.display = "none";

    showMessage(
        "Web desktop applications have been closed. " +
        "This does not shut down your real computer."
    );
}

/* MESSAGE */

function showMessage(message) {
    alert(message);
}

/* CLOCK */

function updateClock() {
    const now = new Date();

    document.getElementById("clock").innerHTML =
        now.toLocaleTimeString([], {
            hour: "2-digit",
            minute: "2-digit"
        }) +
        "<br>" +
        now.toLocaleDateString();
}

updateClock();
setInterval(updateClock, 1000);

/* INITIALIZE WINDOWS */

windows.forEach(win => {
    win.style.display = "none";
});
</script>

</body>
</html>