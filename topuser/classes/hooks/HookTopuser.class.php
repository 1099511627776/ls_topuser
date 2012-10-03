<?php

class PluginTopuser_HookTopuser extends Hook {

    /*
     * Регистрация событий на хуки
	*/
    public function RegisterHook() {
        $this->AddHook('template_top_authors', 'displayAuthors',__CLASS__);
    }
	
	public function displayAuthors($params){
		$sOrder='user_rating';
		$sOrderWay='desc';
		$aFilter=array(
			'activate' => 1
		);
		$aResult=$this->User_GetUsersByFilter($aFilter,array($sOrder=>$sOrderWay),1,Config::Get('module.user.per_page'));
		$aUsers=$aResult['collection'];
		
		$this->Viewer_Assign('aUsers',$aUsers);
		$s = $this->Viewer_Fetch(Plugin::GetTemplatePath('topuser').'top_author.tpl');
        return $s;
	}
}
?>
