{debug}
{foreach from=$aUsers item=oUser}
<li>
	<a href="{$oUser->getUserWebPath()}" title="{$oUser->getLogin()}">
		<img src="{$oUser->getProfileAvatarPath(24)}" alt="{$oUser->getLogin()}">
	</a>
</li>
{/foreach}
