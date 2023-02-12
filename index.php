<?php
//mayank:i did some code cleanup, still kinda a code h1llscape
//mark: yo I wanna make a windows XP dark mode how could I do that
//mayank:try using *{filter:invert(100%);} to invert colors
//mayank:*:not(iframe){filter:invert(100%);} exclude iframes
//todo:fix glitch where window spawns at (0, 0) rather than where slider/dragger is at, by adjusting for dragger on container$(id)
//like container${id} left are adjusted to fix slider
// > to fix dis first we mus fix te other glitch where ondrag/resize
?>
<?php
// Following code sets version specifics e.g. wallpaper and CSS stylesheet link
if (!isset($_GET['x'])) {
  $x = '11';//Default: W11
} else {
  $x = $_GET['x'];
}
if ($x == '7') {
  $wallpaper = 'https://wparena.com/wp-content/uploads/2009/09/img0.jpg';
  $ver = 'Emulate7';
  $icon = 'icon7.png';
}
if ($x == 'xp') {
  $wallpaper = 'https://cdn.wallpaperhub.app/cloudcache/b/d/7/6/4/b/bd764bb25d49a05105060185774ba14cd2c846f7.jpg';
  $ver = 'EmulateXP';
  $icon = 'iconXP.png';
}
if ($x == 'dxp') {
  $wallpaper = 'https://preview.redd.it/w0qg2oanfel51.png?auto=webp&s=6a76ee981e5b2c3a4adb781490acff6aafa0535e';
  $ver = 'DarkEmulateXP';
  $icon = 'iconXPdark.png';
}
if ($x == 'welon') {
  $wallpaper = "https://cdn.discordapp.com/attachments/1051247160185860146/1073398417985904650/materwelon7.jpg";
  $ver = 'Materwelon';
  $icon = 'YUM.png';
}
if ($x == '98') {
  $wallpaper = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR81uO7IYcOA4sd-_dlR1B0BeY-NWWfRnNTfdvcaz1zgg&s";
  $ver = 'Emulate98';
  $icon = 'icon98.png';
}
if ($x == '10') {
  $wallpaper = "https://4kwallpapers.com/images/wallpapers/windows-10-dark-blue-5k-8k-1920x1080-733.jpg";
  $ver = 'Emulate10';
  $icon = 'icon10.png';
}
$blah = 1;
if ($x == '11') {
  $icon = 'favicon.png';
  $blah = 0;
  // $ver = '<img src="/favicon.ico" style="height:20px;"/>';
  $ver = 'Emulate11!';
  $wallpaper = "https://cdn.wallpaperhub.app/cloudcache/1/1/1/7/b/a/1117ba5b2551662e7fe9667e35c568eeaed1abf2.jpg";
}
if ($x == 'dark') {
  $wallpaper = 'https://4kwallpapers.com/images/wallpapers/windows-11-purple-abstract-dark-background-dark-purple-dark-3840x2400-8995.png';
  $icon = 'icondark.png';
  $ver = 'Emulate11.';
}
if ($x == '11' or $x == '10' or $x =='dark' or $x == 'welon') {
  function PrintIf11($text) {
    echo $text;
  }
} else {
  function PrintIf11($text) {
    return;
  }
}
if ($x == 'dark') {
  function PrintDark($text) {
    // Prints text if the theme is dark. PrintDark("?theme=dark") is a wrapper for all our php apps which are programmed to accept ?theme=dark
    echo $text;
  }
} else {
  function PrintDark($text) {return;}
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $ver; ?></title>
  <!--jQuery-->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="icon" href="<?php echo "icons/".$icon; ?>" type="image/x-icon" />
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <?php
  // Following code determines which stylesheet to link based on theme.
  // If stylesheet isn't locally hosted it gets from unpkg
  if ($x == '11' or $x == '10') {
      echo '  <link rel="stylesheet" href="styles/style.css">';
  }
  if ($x != '11' and $x != '10' and $x != 'dark') {
    echo '  <link rel="stylesheet" href="https://unpkg.com/'.$x.'.css">';
  }
  if ($x == 'dark') {
      echo '  <link rel="stylesheet" href="styles/styledark.css">';
  }
  if ($x == 'welon') {
      echo '  <link rel="stylesheet" href="styles/WELON.css">';
  }
  ?>
  <style id="msstyles">
  * {
    cursor: url("http://www.rw-designer.com/cursor-extern.php?id=135794");
  }
  body {
	  background-image: url("<?php echo $wallpaper;?>");
    background-size:     cover;/* was cover*/
    background-repeat:   no-repeat;
    background-position: center;              /* optional, center the image */
    overflow: hidden;
    max-width: 100%;
    max-height: 100%;
  }
  @supports (-moz-appearance:none) {
    body {
      height: 100%;
      overflow: hidden;
    }
  }
  .background {
    width: fit-content;
    height: fit-content;
  }
  iframe {
    border: none;
    outline: none;
    width: 100%;
    height: 100%;
  }
  a {
    color: white;
  }
  </style>
    <script>
function launchFullScreen(element) {
  // Full Screen Function
  element = document.getElementById(element)
  if(element.requestFullScreen) {
    element.requestFullScreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  }
}

function ToggleDisp() {
  // Alternates opacity to 100% and 0% (show, don't show)
  var x = document.getElementById("buttonopts");
  if (x.style.opacity === "1") {
    x.style.opacity = "0";
    x.style.pointerEvents = 'none';
  } else {
    x.style.opacity = "1";
    x.style.pointerEvents = 'auto';
  }
}

var z_index_counter = 0; // Latest ZIndex = This+1
windowInstances = []
function new_window(id, link, title) {
  // Creates a window
  windowInstances.push(id);
  // Container div helps keep track of style, logs the change in window position from the slider
  // Draggable div for jquery drag func
  var html_template = `
<style>
  
  #draggable${id} {
    top: 1;
    left: 1;
    position: absolute;
  }
  
</style>
<script>
  
  function minm${id}() {
    document.getElementById('container${id}').style.opacity = '0';
    document.getElementById('container${id}').style.zIndex = '-1';
    document.getElementById("winbtns").innerHTML += \`<button type='button' class='taskbar' onclick='document.getElementById("container${id}").style.opacity = "1";updatezindex${id}();this.remove();'> ${title} </button> \`;
    $('#apps').prop('selectedIndex', 0);
  }
  function maxm${id}() {
    document.getElementById('draggable${id}').style.width = "100%";
    document.getElementById('draggable${id}').style.height = "100%";
    document.getElementById('draggable${id}').style.top = "0%";
    document.getElementById('draggable${id}').style.left = "0%";
    document.getElementById('frame${id}').style.opacity = "1";
  }
  function unload${id}() {
    document.getElementById("container${id}").style.opacity = "0";
    document.getElementById("frame${id}").src = "about:blank";
    windowInstances = windowInstances.filter(e => e !== '${id}');
    document.getElementById("container${id}").style.pointerEvents = 'none';
  }
  function updatezindex${id}() {
    // Position it absolutely, so that we can bring to front
    document.getElementById("container${id}").style.position = 'absolute';
    // Update Z-Index To Bring-To-Front
    z_index_counter += 1;
    document.getElementById("container${id}").style.zIndex = z_index_counter;
    // Position it relatively, so that we can let x, y, width, and height be modified by $().draggable()
    document.getElementById("container${id}").style.position = 'relative';
  }
<\/script>
<div class="background" id="container${id}" class="ui-widget-content" onmousedown="updatezindex${id}()">
  <div class="window blue glass active" id="draggable${id}">
    <div class="title-bar">
      <div class="title-bar-text">${title}</div>
      <div class="title-bar-controls glass">
        <button class="controls-indiv-btn" aria-label="Minimize" onclick="minm${id}()"><?php PrintIf11('[_]'); ?></button>
        <button class="controls-indiv-btn" aria-label="Maximize" onclick="launchFullScreen('frame${id}')"><?php PrintIf11('[o]'); ?></button>
        <button class="controls-indiv-btn" aria-label="Close" onclick='unload${id}();'><?php PrintIf11('[x]'); ?></button>
      </div>
    </div>
    <div class="window-body" id="resizable${id}" max-width="100%" max-height="100%">
      <iframe src="${link}" id="frame${id}" allowfullscreen/>
    </div>
  </div>
</div>
`
  $( "#draggable" + id ).draggable();
  $( "#resizable" + id ).resizable();
  $( "#draggable" + id ).focus(function () {
    alert("DRAGFOCUS")
  });
  // document.getElementById("winbox").innerHTML += html_template;
  $( "#winbox" ).append(html_template);
  //TEMP-PATCH - For long term we have to fix autorefresh glitch
  for (let i = 0; i < windowInstances.length; i++) {
      $( "#draggable" + windowInstances[i] ).draggable();
      $( "#resizable" + windowInstances[i] ).resizable();
  }
}
function getTime() {
    var datetime = new Date().toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3")
    document.getElementById("datetime").innerText = datetime + " [Click to Update]";
}
function populateApp() {
  appname = document.getElementById("apps");
  if (appname.value == "about:blank") {
    return;
  }
  if (appname.value.includes("CSTM: ")) {
    window.open(appname.value.replace("CSTM: ",""), "Custom App", "popup");
  } else {
    new_window("ripbozo"+Date.now().toString().replaceAll(".",""),
              appname.value,
              $("#apps option:selected").text());
  }
  $('#apps').prop('selectedIndex', 0);
}

function InstallApp(appname, apphref) {
  document.getElementById("apps").innerHTML += '    <option value="'+apphref+'">'+appname+'</option>';
} // 

new_window("ndisp_bugfix_temp", "about:blank", "ndisp_bugfix_temp");
document.getElementById("ndisp_bugfix_temp").style.display = 'none';
</script>

<center style="bottom:10%;">
  <br />
</center>

<div id="winbox">
  <!-- Window Instances Appended Here -->
</div>
<div id="nonwinbtns" style="position:absolute;bottom:2.5%;left:1%;">
    <div id="buttonopts" style="opacity:0;">
      <select name="theme" id="theme">
      <option selected disabled> Choose a theme.. </option>
      <option value="/?x=98">Win 98 (Mantained by Mark)</option>
      <option value="/?x=xp">Win XP (Mantained by Mark)</option>
      <option value="/?x=dxp">Win XP Dark Mode [DEPRECATED] (Mantained by Mark)</option>
      <option value="/?x=7">Win 7 (Mantained by Mark)</option>
      <option value="/?x=welon">MATERWELON (Mantained by Materwelon)</option>  
      <option value="/?x=10">Win 10 (Mantained by Mayank and Mark)</option>
      <option value="/?x=11">Win 11 (Mantained by Mayank and Mark)</option>
      <option value="?x=dark">Win 11 Dark Mode (Mantained by Mayank)</option>
      </select>
      <button type="button" onclick="window.location=document.getElementById('theme').value"> Restart To Theme </button>
      <br/>
      <button type="button" style="background-color:none;outline:none;border:none;" onclick="location.reload();"> Update And Restart </button> 
      <br/>
      <script>
        const addCSS = css => document.head.appendChild(document.createElement("style")).innerHTML=css;
      </script>
      <button type="button" onclick="addCSS('iframe{opacity:1;}');">Disable Transparency</button>
      <button type="button" onclick="addCSS('iframe{opacity:0.625;}');">Enable Transparency</button>
    </div>
    <button type="button" class="taskbar" style="background-color:none;outline:none;border:none;" onclick="ToggleDisp();"> <?php echo $ver; ?> </button> 
    <select class="taskbar" name="apps" id="apps" onclick="populateApp()">
    <!--   -->
    <option value="about:blank" selected disabled> Select an app... </option>
    <option value="MyApps/tutorial.php" selected> README </option>
    <option value="https://docs.google.com/document/d/1uJmzlBpk7sdp0eZ1OmpnERCaMDqmbjAG3EujlZD-Dho/edit?usp=sharing">CHANGELOG</option>
    <option value="MyApps/other.php">[DevSDK] AppFromLink</option>
    <option value="https://toocoolforschool.ml/">Chrome (unblocked) </option>
    <!-- <option value="https://jspaint.app/">Paint95</option>
    <option value="https://v2.mkcodes.repl.co/">Chat</option> -->
    <option value="MyApps/Python.php">Python</option>
    <option value="https://inflopnito.com/">Inflopnito</option>
    <option value="MyApps/IFrameLoader.php">IFrame Loader</option>    
    <option value="https://novnc.com/noVNC/vnc.html">VNC Connect</option>
    <option value="https://geometry.pw/">ShellShockers [Fallback 1]</option>
    <option value="https://mathactivity.xyz">ShellShockers [Fallback 2]</option>
    <option value="https://mathdrills.life/">ShellShockers [Fallback 3]</option>
    <option value="https://yolk.quest/">ShellShockers [Fallback 4]</option>
    <option value="https://photopea.com/">Photoshop</option>
    <option value="https://scuffeduno.online/">Scuffed Uno</option>
    <option value="https://turbowarp.org/258517439/embed?fps=60">Taiko</option>
    <option value="https://minesweeper.one/">Minesweeper</option>
    <option value="https://turbowarp.org/220672247/embed?fps=120">Osu! Mania (via Scratch)</option>
    <option value="https://among-us-online-fan-remake.1tim.repl.co/">Among Us</option>
    <option value="CSTM: https://eaglercraft.ru/">Eaglercraft Launcher</option>
    <option value="https://garticphone.com">Gartic Phone</option>
    <option value="https://gartic.io">Gartic</option>
    <option value="https://narrow.one/">Narrow One</option>
    <option value="CSTM: https://sm64web.clambam10.repl.co/f.html">Super Mario 64</option>
    <option value="CSTM: https://eaglercraft.ru/">Eaglercraft [Launcher]</option>
    <option value="CSTM: https://working6.naaga-kartheekk.repl.co/">Eaglercraft [Kartheek's Server]</option>
    <option value="https://sm.mkcodes.repl.co/actualindex.php<?php PrintDark("?theme=dark"); ?>">Xorfum - Social Media</option>
    <option value="MyApps/textbox.php<?php PrintDark("?theme=dark"); ?>">Notes</option>
    <option value="MyApps/appstore.php">[INDEV] AppStore </option>
  </select>
</div>
<div id="winbtns" style="position:absolute;top:2.5%;left:1%;text-align:center;width:100%;" class="taskbar">
  <input id="slider" type="range" style="width:100%;" onchange="test1();" min="-8000" max="8000" value="0" step="1" />
  <script>
  function test1() {
    $('div[id^=\'container\']').css( "left", document.getElementById('slider').value);
  }
  </script>
  <br/>
</div>
<script>
  populateApp();
</script>
<button id="datetime" onclick="getTime()" style="bottom:2.5%;right:1.5%;position: absolute;margin:auto;display:fixed;" class="taskbar"> Click to Update Time </button>
<div id="notifs" style="right:1.5%;text-align:right;opacity:0.5;position:absolute;">
<br/>
</div>
<script>
function notify(title, text) {
  mtime = Date.now().toString()+Math.random().toString()
  document.getElementById("notifs").innerHTML+=`  <span id="tempnotice${mtime}" class="notif" style="opacty:0.5;border:16px;" class="taskbar"><b>${title}</b> <p style="display:inline-block;">${text}</p> <button type="button" onclick="document.getElementById('tempnotice${mtime}').remove()" class='taskbar'>[x]</button><br style="line-height: 5px;" /></span>`;
}
notify("Only use this version of Emulate11 if you're done with your work", "Thanks!")
notify("NOTE!", "If you minimize a window it will restore itself where it was before, not at current position.");
// notify("Testing", "Test notification");
// notify("Testing", "Test notification");
// notify("Testing", "Test notification");
</script>

