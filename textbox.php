<!-- Editor -->
<script>parent.notify("You're on an old version of W11. Please upgrade.")</script>
<head>
<style>
<?php 
if ($_GET['theme'] == 'dark') {
  echo file_get_contents("styledark.css");
  echo '*{background-color:black;color:white;}';
} else {
  echo file_get_contents("style.css");
}?>
div#insbtn {
  outline: 1px solid black;
  border: 1px solid black;
}
</style>
</head><script>
  parent.notify("[WARNING!]", "Only load HTML documents you make to prevent malware.")
  function download(data, filename, type) {
    var file = new Blob([data], {type: type});
    if (window.navigator.msSaveOrOpenBlob) // IE10+
        window.navigator.msSaveOrOpenBlob(file, filename);
    else { // Others
        var a = document.createElement("a"),
                url = URL.createObjectURL(file);
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        setTimeout(function() {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);  
        }, 0); 
    }
  }
  var openFile = function(event) {
    var input = event.target;
  
    var reader = new FileReader();
    reader.onload = function() {
      var text = reader.result;
      var node = document.getElementById('body');
      node.innerHTML = text;
      console.log(reader.result.substring(0, 200));
    };
    reader.readAsText(input.files[0]);
  };
function pasteHtmlAtCaret(html) {
    var sel, range;
    if (window.getSelection) {
        // IE9 and non-IE
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();

            // Range.createContextualFragment() would be useful here but is
            // only relatively recently standardized and is not supported in
            // some browsers (IE9, for one)
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);

            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        // IE < 9
        document.selection.createRange().pasteHTML(html);
    }
    document.getElementById(body).focus();
}
</script>
<button type="button" class="taskbar" onclick="download(document.getElementById('body').innerHTML, 'saved_notes.html', 'html')">Save To Local</button>
<input type='file' accept='text/plain' onchange='openFile(event)'><br>
<div id="insbtn"></div>
<script>
  function add(elem) {
    document.getElementById("insbtn").innerHTML += "<button type='button' onclick='pasteHtmlAtCaret(\"<${elem}>Insert ${elem}</elem>\");'>${elem}</button>".replaceAll("${elem}", elem);
  }
  add("b")
  add("i")
  add("u")
  add("strike")
  add("marquee")
  add("em")
  add("h1")
  add("h2")
  add("h3")
  add("h4")
  add("h5")
  add("h6")
  add("center")
  add("p")
  add("blockquote")
</script>
<div id="body" style="font-family: 'Segoe UI';width:100%;height:100%;" class='taskbar' contenteditable>
  Enter text here.. (you can paste text from somewhere else to format)
</div>
<!--INDEV-->