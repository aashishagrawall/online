<div id="area" >
        <div id="question-no">Question No. 1</div>
        <div id ="typeCode">
            <div id="sec-1">
        <div id="code-question">
            

        </div>

            <div id="constraints">
                 
            </div>
            </div>
        </div>
        <div id="border"></div>
        <div id="i-o">

            <div id="input">

                  <code>
                      Input

                  </code></div>
            <div id="output">

                  <code>
                    Output
                     
                </code>  </div>

        </div>
        <div id="border"></div>
        <div id="code-head">
        <div id="code-here">Code Here : </div>
            <div id="choose-lang" style="vertical-align: middle">


            <div id="lang-choice-1" class="lang-choice"  style="float: right; padding: 5px; border-radius:0px 9px 9px 0px ; border : 1px solid #cfcfcf;">C++</div>
                <div id="lang-choice-2"  class="lang-choice" style="float: right;margin-left:10px;border-radius:9px 0px 0px 9px;padding: 5px; border : 1px solid #cfcfcf;" >Java</div>

            </div>
        </div>
        <script src="src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
        <div id="editor">
            <script>
                var editor = ace.edit("editor");
                editor.session.setUseWorker(false);
                editor.setValue("");
                editor.getSession().setMode("ace/mode/javascript");
            </script>
        </div>
        <div id="custom-io" style="display: flex; flex-direction: row">
        <div id="custom-input" style="float: left">
            <div id="custom-input-head">
                <input type="checkbox" checked> &nbsp;Use Custom Input
            </div>
            <textarea id="custom-input-text" style="margin : 10px 0px 10px 0px  ; width:200px;height: 200px; max-width: 200px;max-height: 200px; "></textarea>
        </div>
            <div id="custom-input" style="float: right ; width: auto">
  
                <div id="output-head">
                    Output :
                </div>
                <textarea id="output-text" readonly style="margin : 10px 0px 10px 0px  ;  width: 600px ; height: 200px"></textarea>
            </div>
        </div>
        <div id="button-area" style="margin: 20px">
            <div id = "button" class="custom-test"    >
                Test
            </div>
 <div id = "button" class="submit-test"    >
                Submit
            </div>
        </div>