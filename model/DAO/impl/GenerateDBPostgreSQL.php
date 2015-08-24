<?php


class GenerateDBPostgreSQL implements IGenerateDB {
	
	
	public function generate($entity){
		$classe = get_class($entity);
	
		$reflectionClass = new ReflectionAnnotatedClass($classe);
	
		$tabela = $reflectionClass->getAnnotation('Table')->value;
	
		$propriedades = $reflectionClass->getProperties();
		foreach($propriedades as $propriedade){
			if($propriedade->hasAnnotation('Column')){
				$getter = $propriedade->name;
				$key = $propriedade->getAnnotation('Column')->name;
				$params = (array) $propriedade->getAnnotation('Column');
				foreach($params as $chave=>$valor){
					$fields[$key][$chave] = $valor;
				}
			}
			if ($propriedade->hasAnnotation('Join')){
				$params = (array) $propriedade->getAnnotation('Join');
				foreach($params as $chave=>$valor){
					$fields[$key][$chave] = $valor;
				}
			}
		}
	
		$script = "DROP TABLE IF EXISTS ".SCHEMA.$tabela."; \n"
				."CREATE TABLE ".SCHEMA.$tabela ." ( \n";
		$uid;
	
		foreach($fields as $key=>$value){
			$fk;
			if (isset($value['joinTable'])){
				$fk = "\tCONSTRAINT ".$tabela."_".$value['joinTable']."_fk FOREIGN KEY($key)\n";
				$fk .= "\t\tREFERENCES ".SCHEMA.$value['joinTable']."($value[joinColumn]) MATCH SIMPLE\n";
				$fk .= "\t\tON UPDATE NO ACTION ON DELETE NO ACTION,\n";
				$script .= "\t". $key . " integer, \n";
			} else if($key == 'id'){
				$script .= "\t". $key . " serial NOT NULL, \n";
				$uid = $key;
			} else {
				$script .= "\t". $key . " " . ($value['type'] == 'integer' ? 'integer' : ($value['type'] == 'timestamp' ? 'timestamp' : 'character varying')) . ", \n";
			}
		}
		$script .= @$fk;
		$script .= "\tCONSTRAINT ".$tabela."_pk PRIMARY KEY (".$uid.") \n";
		return $script . " );\n\n -- \n";
	}
}