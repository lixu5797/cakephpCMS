{$this->Form->select('sssss', $select1)}
<a href="admin/users/login" rel="prettyPopin">ポップアップ！</a>
<a href="admin/users/login" rel="shadowbox" title="タイトル">ポップアップ</a>
<form method="post" action="homes/index">
            <select id="parent" name="pa">
               <option value="1">花</option>
               <option value="2">動物</option>
            </select>
            <select id="child" name="cl">
               <option class="sub_1" value="1">バラ</option>
               <option class="sub_1" value="2">ひまわり</option>
               <option class="sub_1" value="3">チューリップ</option>
               <option class="sub_2" value="4">牛</option>
               <option class="sub_2" value="5">犬</option>
               <option class="sub_2" value="6">猫</option>
               <option class="sub_2" value="7">トラ</option>
            </select>
            <select id="grandsun" name="gr">
               <option class="sub_1" value="1">バラ type 1</option>
               <option class="sub_1" value="2">バラ type 2</option>
               <option class="sub_1" value="3">バラ type 3</option>
               <option class="sub_2" value="1">ひまわり type 1</option>
               <option class="sub_2" value="2">ひまわり type 2</option>
               <option class="sub_3" value="1">チューリップ type 1</option>
               <option class="sub_3" value="2">チューリップ type 2</option>
               <option class="sub_4" value="1">牛 type 1</option>
               <option class="sub_4" value="2">牛 type 2</option>
               <option class="sub_4" value="3">牛 type 3</option>
               <option class="sub_5" value="1">犬 type 1</option>
               <option class="sub_5" value="2">犬 type 2</option>
               <option class="sub_5" value="3">犬 type 3</option>
               <option class="sub_5" value="4">犬 type 4</option>
               <option class="sub_6" value="1">猫 type 1</option>
               <option class="sub_6" value="2">猫 type 2</option>
               <option class="sub_7" value="1">トラ type 1</option>
               <option class="sub_7" value="2">トラ type 2</option>
               <option class="sub_7" value="3">トラ type 3</option>
            </select>
<input type="submit" value="送信" />
</form>
<script type="text/javascript">
<!--
	function makeSublist(parent,child,isSubselectOptional,childVal){
		$("body").append("<select style='display:none' id='"+parent+child+"'></select>");
		$('#'+parent+child).html($("#"+child+" option"));
		var parentValue = $('#'+parent).attr('value');
		$('#'+child).html($("#"+parent+child+" .sub_"+parentValue).clone());
		childVal = (typeof childVal == "undefined")? "" : childVal ;
		$("#"+child+' option[@value="'+ childVal +'"]').attr('selected','selected');
		$('#'+parent).change( 
			function(){
				var parentValue = $('#'+parent).attr('value');
				$('#'+child).html($("#"+parent+child+" .sub_"+parentValue).clone());
				if(isSubselectOptional) $('#'+child).prepend("<option value='none'> -- Select -- </option>");
				$('#'+child).trigger("change");
				$('#'+child).focus();
			}
		);
	}
	$(document).ready(function(){
		makeSublist('child','grandsun', true, '');   
		makeSublist('parent','child', false, '1');   
	});
// -->
</script>