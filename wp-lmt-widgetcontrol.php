<script type="text/javascript">
function enableDisable(box_checked)

{
	var disable = !box_checked.checked;
	var argument_length = arguments.length;
	var obj, startIndex = 1;
	var frm = box_checked.form;
	for (var i=startIndex;i<argument_length;i++)

	{
		obj = frm.elements[arguments[i]];
		if (typeof obj=="object")

		    {
			if (document.layers) 
				{
				if (disable){
					obj.onfocus=new Function("this.blur()");
					if (obj.type=="text") obj.onchange=new Function("this.value=this.defaultValue");

					}

				else 
					{

					obj.onfocus=new Function("return");
					if (obj.type=="text") obj.onchange=new Function("return");
					}

				}
			else obj.disabled=disable;	
			}

	}

}
</script>

<p>

<label for="lmt_title">Title for Market Trends Graph:
<input  name="lmt_title" type="text" value="<?php echo $lmt_title;?>" /></label>
<input type="hidden" id="lmt_submit" name="lmt_submit" value="1" />
</p
<p class="lmt_box1">

Your Live Market Trend Graph will load without default names in the boxes. 
However, if you would like to input names that will display when your widget loads, please check this box, which also means that you agree that
the backlinks are allowed on your site.

<input type="checkbox" id="lmt_enable_checkbox" name="lmt_enable_checkbox" value="<?php echo $lmt_enable_checkbox; ?>" onclick="enableDisable(this,'lmt_first_name','lmt_second_name');" />

<input type="hidden" id="lmt_submit" name="lmt_submit" value="4" />

<br/>

</p>

<p>
<label for="lmt_first_name">Enter market name you want to compare:
<input  id="lmt_first_name" name="lmt_first_name" disabled="disabled" type="text" value="<?php 

 if(empty($options['lmt_first_name'])){
      echo $lmt_first_name = "Bonds";
   }else echo $lmt_first_name;?>" /></label>			
<input type="hidden" id="lmt_submit" name="lmt_submit" value="2" />

</p>

<p>

<label for="lmt_second_name">Enter market name you want to compare:

<input id="lmt_second_name" name="lmt_second_name" disabled="disabled" type="text" value="<?php 

 if(empty($options['lmt_second_name'])){
    echo $lmt_second_name = "Stocks"; 
 }else echo $lmt_second_name;?>" /></label>			
<input type="hidden" id="lmt_submit" name="lmt_submit" value="3" />

</p>