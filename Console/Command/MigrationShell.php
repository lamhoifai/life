<?php
App::uses('Xml', 'Utility');
App::uses('PasswordHash', 'Vendor');

/**
 * MigrationShell script to migrate from Locbit 1.0 to Locbit Portal Ap
 *
 * @property User $User
 * @property UsersRole $UsersRole
 */
class MigrationShell extends AppShell {

	public $uses = array(
		'Pokedex',
		'PokemonType',
		'PokemonSkillCategory',
		'PokedexPokemonSkill',
		'PokedexPokemonType',
		'PokemonSkill'
	);

	public function main() {
		$this->out('Migration script:');
		$this->out(' 1) updatePokedex: Updates stat of Pokedex');
		$this->out(' 2) updatePokemonSkill: Updates data of PokemonSkill');
		$this->out(' 3) updatePokedexPokemonSkill: Updates data of updatePokedexPokemonSkill');
	}

	public function updatePokedex() {
		$this->out('Changing many-to-many relationship to many-to-one for Roles');
		$nidoran_suffix = 'f';
		$htmlurl = Configure::read('Pokedex.source.url');
		$html = file_get_contents($htmlurl);
		preg_match_all('/<tr>\n.*<td class.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*<\/td>/',$html, $pokemon_info);
		for($i=0;$i<150;$i++) {
			$data = array();
			$data_type = array();
			preg_match_all('/<td class="name">.*<\/td>/',$pokemon_info[0][$i], $pokemon_name);
			$data['Pokedex']['name'] = strip_tags($pokemon_name[0][0]);
			//have exception case for Mr Mime, Farfetch'd, Nidoran-m and Nidoran-f
			$data['Pokedex']['ref'] = strip_tags($pokemon_name[0][0]);
			if($data['Pokedex']['ref'] == 'Mr. Mime') {
				$data['Pokedex']['ref'] = 'Mr-Mime';
			}
			if($data['Pokedex']['ref'] == 'Farfetch\'d') {
				$data['Pokedex']['ref'] = 'Farfetchd';
			}
			if(strpos($data['Pokedex']['ref'] , 'idoran')) {
				$data['Pokedex']['ref'] = 'Nidoran-'.$nidoran_suffix;
				$data['Pokedex']['name'] = $data['Pokedex']['ref'];
				$nidoran_suffix = 'm';
			}
			
			preg_match_all('/<a class=".*<\/a>/',$pokemon_info[0][$i], $pokemon_type);
			$conditions = array('PokemonType.name' => strip_tags($pokemon_type[0][0]));
			$type = $this->PokemonType->find('first',compact('conditions'));
			if(!$type) {
				//$data['PokedexPokemonType']['pokemon_type1_id'] = NULL;
			} else {
				$data['PokemonType'][0] = array();
				$data['PokemonType'][0]['pokemon_type_id'] = $type['PokemonType']['id'];
			}
			if(count($pokemon_type[0]) > 1) {
				$conditions = array('PokemonType.name' => strip_tags($pokemon_type[0][1]));
				$type = $this->PokemonType->find('first',compact('conditions'));
				if(!$type) {
					//$data['Pokedex']['pokemon_type2_id'] = NULL;
				} else {
					$data['PokemonType'][1] = array();
					$data['PokemonType'][1]['pokemon_type_id'] = $type['PokemonType']['id'];
				}
			}
			preg_match_all('/<td>.*<\/td>/',$pokemon_info[0][$i], $pokemon_stat);
			$data['Pokedex']['hp'] = strip_tags($pokemon_stat[0][0]);
			$data['Pokedex']['attack'] = strip_tags($pokemon_stat[0][1]);
			$data['Pokedex']['defense'] = strip_tags($pokemon_stat[0][2]);
			$data['Pokedex']['special_attack'] = strip_tags($pokemon_stat[0][3]);
			$data['Pokedex']['special_defense'] = strip_tags($pokemon_stat[0][4]);
			$data['Pokedex']['speed'] = strip_tags($pokemon_stat[0][5]);
			$this->Pokedex->saveAssociated($data);
		}
	}

	public function updatePokemonSkill() {
		$this->out('Changing many-to-many relationship to many-to-one for Roles');
		$htmlurl = Configure::read('PokemonSkill.source.url');
		$html = file_get_contents($htmlurl);
		preg_match_all('/<tr>\n.*<td class.*<\/td>/',$html, $skill_info);
		//debug($skill_info);die();
		for($i=0;$i<count($skill_info[0]);$i++) {
			$data = array();
			preg_match_all('/<a href[^<]*<\/a>/',$skill_info[0][$i], $skill_name);
			$data['PokemonSkill']['name'] = strip_tags($skill_name[0][0]);
			//debug($data);die();
			preg_match_all('/<td><a class=".*<\/a><\/td>/',$skill_info[0][$i], $pokemon_type);
			$conditions = array('PokemonType.name' => strip_tags($pokemon_type[0][0]));
			$type = $this->PokemonType->find('first',compact('conditions'));
			if(!$type) {
				$data['PokemonSkill']['pokemon_type_id'] = NULL;
			} else {
				$data['PokemonSkill']['pokemon_type_id'] = $type['PokemonType']['id'];
			}
			preg_match_all('/<span class=".*<\/span>/',$skill_info[0][$i], $pokemon_category);
			$conditions = array('PokemonSkillCategory.name' => strip_tags($pokemon_category[0][0]));
			$type = $this->PokemonSkillCategory->find('first',compact('conditions'));
			if(!$type) {
				$data['PokemonSkill']['pokemon_skill_category_id'] = NULL;
			} else {
				$data['PokemonSkill']['pokemon_skill_category_id'] = $type['PokemonSkillCategory']['id'];
			}
			
			preg_match_all('/<td class="numeric ?">.[0-9]*<\/td>/',$skill_info[0][$i], $skill_effect);
			
			$data['PokemonSkill']['power'] = strip_tags($skill_effect[0][0]);
			$data['PokemonSkill']['accuracy'] = strip_tags($skill_effect[0][1]);
			$data['PokemonSkill']['pp'] = strip_tags($skill_effect[0][2]);
			if(strip_tags($skill_effect[0][0]) == '-') {
				$data['PokemonSkill']['power'] = null;
			}
			if(strip_tags($skill_effect[0][1]) == '-' || strip_tags($skill_effect[0][1]) == '∞') {
				$data['PokemonSkill']['accuracy'] = null;
			}
			if(strip_tags($skill_effect[0][2]) == '-') {
				$data['PokemonSkill']['pp'] = null;
			}
			//debug($data);die();
			$this->PokemonSkill->saveAssociated($data);
			//debug($skill_effect);die();
		}
	}

	public function updatePokedexPokemonSkill() {
		$this->out('Changing many-to-many relationship to many-to-one for Roles');
		$pokedexes = $this->Pokedex->find('all');
		//$pokedexes = array();
		//array_push($pokedexes,array('''Farfetchd');
		//debug($pokedexes);die();
		for($i=0;$i<count($pokedexes);$i++) {
			$htmlurl = sprintf(Configure::read('PokedexPokemonSkill.source.url'),strtolower($pokedexes[$i]['Pokedex']['ref']));
			$html = file_get_contents($htmlurl);
			$table = strpos($html, 'table class="data pokedex-moves-level');
			$table_end = strpos($html, '</table>', $table);
			$content = substr($html,$table,$table_end-$table);
			preg_match_all('/<tr>\n.*\n.*<\/td>/',$content, $skill_info);
			for($j=0;$j<count($skill_info[0]);$j++) {
				$data = array();
				preg_match_all('/<td class="numeric">.*<\/td>/',$skill_info[0][$j], $req_lv);
				$data['PokedexPokemonSkill']['req_lv'] = strip_tags($req_lv[0][0]);
				$data['PokedexPokemonSkill']['pokedex_id'] = $pokedexes[$i]['Pokedex']['id'];
				preg_match_all('/<a href[^<]*<\/a>/',$skill_info[0][$j], $skill_name);
				$conditions = array('PokemonSkill.name' => strip_tags($skill_name[0][0]));
				$skill = $this->PokemonSkill->find('first',compact('conditions'));
				$data['PokedexPokemonSkill']['pokemon_skill_id'] = $skill['PokemonSkill']['id'];
				$this->PokedexPokemonSkill->saveAssociated($data);
			}
			$this->out($pokedexes[$i]['Pokedex']['name'].' updated!');
		}
	}
}