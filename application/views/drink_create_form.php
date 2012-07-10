<?php
// Mike Ghen
// 7/4/2012
// This is the form for creating a new drink
?>
   
      
            <div data-role="content" style="padding: 15px">
                <form action="drinks/create" method="POST">
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textinput1">
                                Drink
                            </label>
                            <input id="textinput1" placeholder="" value="" type="text" />
                        </fieldset>
                    </div>
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textarea1">
                                Description
                            </label>
                            <textarea id="textarea1" placeholder="">
                            </textarea>
                        </fieldset>
                    </div>
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textinput2">
                                Price
                            </label>
                            <input id="textinput2" placeholder="" value="" type="text" />
                        </fieldset>
                    </div>
                    <input type="submit" data-theme="b" data-icon="plus" data-iconpos="left" value="Submit" />
                </form>
            </div>
        </div>