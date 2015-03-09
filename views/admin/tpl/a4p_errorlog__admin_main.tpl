

[{*
 *	@author:	a4p ASD / Andreas Dorner
 *	@company:	apps4print / page one GmbH, Nürnberg, Germany
 *
 *
 *	@version:	1.0.2
 *	@date:		09.03.2015
 *
 *
 *	a4p_errorlog__admin_main.tpl
 *
 *	apps4print - a4p_errorlog - display php errors in OXID eShop
 *
 *}]

[{*---------------------------------------------------------------------------------------------*}]
[{*		apps4print																				*}]
[{*---------------------------------------------------------------------------------------------*}]


[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]


<script type="text/javascript">
<!--
function _groupExp(el) {
	var _cur = el.parentNode;

	if (_cur.className == "exp")
		_cur.className = "";
	else
		_cur.className = "exp";
}
//-->
</script>

<style>
	.groupExp  dl dt {
		width:95px;
		margin-top:3px;
	}
	
	.groupExp dl dd {
		padding-left:105px;
	}
</style>

[{cycle assign="_clear_" values=",2" }]

<div class="info">
	<strong>[{ oxmultilang ident="a4p_ERRORLOG_HEADLINE" }]</strong>

	[{if $oView->check_logfile() }]

		[{assign var="a4p_ERRORLOG_LOGFILE_INFO" value="a4p_ERRORLOG_LOGFILE_INFO"|oxmultilangassign|replace:"__LOGFILE__":$oView->get_logfile() }]
		[{assign var="a4p_ERRORLOG_LOGFILE_INFO" value=$a4p_ERRORLOG_LOGFILE_INFO|cat:" ( "|cat:$oView->get_logfile_size()|cat:" )" }]
		
		[{assign var="a4p_ERRORLOG_ANZ_LINES_INFO" value="a4p_ERRORLOG_ANZ_LINES_INFO"|oxmultilangassign|replace:"__ANZ_LINES__":$oView->get_anz_lines() }]
		
		<br><br>
		<div class="infoNotice">[{$a4p_ERRORLOG_LOGFILE_INFO}]</div>
		<div class="infoNotice">[{$a4p_ERRORLOG_ANZ_LINES_INFO}]</div>
		
	[{else}]
	
		[{assign var="a4p_ERRORLOG_LOGFILE_NOT_FOUND" value="a4p_ERRORLOG_LOGFILE_NOT_FOUND"|oxmultilangassign|replace:"__LOGFILE__":$oView->get_logfile() }]
		<br><br>
		<div class="infoNotice">[{$a4p_ERRORLOG_LOGFILE_NOT_FOUND}]</div>
	
	[{/if}]
	
</div>

<form name="a4p_errorlog" id="a4p_errorlog" action="[{ $oViewConf->getSelfLink() }]" method="post">
	[{ $oViewConf->getHiddenSid() }]
	<input type="hidden" name="oxid" value="[{ $oxid }]">
	<input type="hidden" name="cl" value="a4p_errorlog">
	<input type="hidden" name="fnc" value="">
	<input type="hidden" name="actshop" value="[{$oViewConf->getActiveShopId()}]">
	<input type="hidden" name="updatenav" value="">
	<input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>
[{foreach from=$oView->get_error_list() item=error }]
	<div class="groupExp">
		<div>
			<a href="#" onclick="_groupExp(this);return false;" class="rc">
				<b>
					[{$error.datetime}] :: [{ $error.type }]
				</b>
			</a>
			<dl>
				<dt>
					[{oxmultilang ident='a4p_ERRORLOG_MSG'}]:
				</dt>
				<dd>
					<pre>[{$error.msg}]</pre>
				</dd>
				<div class="spacer"></div>
			</dl>
		 </div>
	</div>
[{/foreach}]


[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]
