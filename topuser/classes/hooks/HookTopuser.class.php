<?php

class PluginTopuser_HookTopuser extends Hook {

    /*
     * Регистрация событий на хуки
	*/
    public function RegisterHook() {
        $this->AddHook('template_underTop', 'displayAuthors',__CLASS__);
    }
	
	public function displayAuthors($params){
		$sOrder='user_rating';
		$sOrderWay='desc';
		$aFilter=array(
			'activate' => 1
		);
		$aResult=$this->User_GetUsersByFilter($aFilter,array($sOrder=>$sOrderWay),1,Config::Get('plugin.topuser.user_count'));
		$aUsers=$aResult['collection'];
		$iUserCount = count($aUsers);
		$i = 0;
		$aUsers1 = array();
		foreach($aUsers as $oUser){
			$aUsers1[] = array(
				'oUser' => $oUser,
				'position' => $iUserCount - $i
			);
			$i++;
		}
	
		$this->Viewer_Assign('aUsers',$aUsers1);
		$s = $this->Viewer_Fetch(Plugin::GetTemplatePath('topuser').'top_author.tpl');
        return $s;
	}
}
?>
