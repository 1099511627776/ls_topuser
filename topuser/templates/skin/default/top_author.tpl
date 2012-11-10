<ul class="topuser_container">
{foreach from=$aUsers item=oUser}
<li class="topuser_item item_rating_{$oUser['position']}">
	<a href="{$oUser['oUser']->getUserWebPath()}" title="{$oUser['oUser']->getLogin()}">
		{$oUser['oUser']->getLogin()}
	</a>
</li>
{/foreach}
	<li class="topuser_item header">
		<strong>{$aLang.plugin.topuser.top_users} {$ls.plugin.topuser.config.user_count}</strong>
	</li>
</ul>